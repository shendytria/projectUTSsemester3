<?php

namespace App\Http\Controllers;

use App\Models\EmailModel;
use Illuminate\Http\Request;
use App\Models\Message; // Model untuk tabel MESSAGE
use App\Models\MessageTo; // Model untuk tabel MESSAGE_TO
use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmailController extends Controller
{
    // Menampilkan form kirim email
    public function create()
    {
        $message = EmailModel::all();
        $users = User::all();
        return view('admin.Email.create', compact('message', 'users')); // Mengarahkan ke form email
    }

    // Proses mengirim email
    public function send(Request $request)
    {

        // Simpan data email ke tabel MESSAGE
        $message = new Message();
        $message->sender = Auth::user()->email;
        $message->subject = $request->subject;
        $message->message_text = $request->message_text;
        $message->create_by = Auth::user()->name;
        $message->create_date = now();
        $message->save();

        // Simpan data penerima ke tabel MESSAGE_TO
        $messageTo = new MessageTo();
        $messageTo->id_message = $message->id;
        $messageTo->to = $request->to;
        $message->create_by = Auth::user()->name;
        $messageTo->create_date = now();
        $messageTo->save();

        return redirect()->back()->with('success', 'Email berhasil dikirim.');
    }
    public function inbox()
    {
        // // Mengambil daftar email yang dikirim ke user yang sedang login
        // $userEmail = Auth::user()->email;

        // // Query untuk mengambil email yang ditujukan kepada user
        // $emails = MessageTo::where('to', $userEmail)
        //             ->join('message', 'message_to.id_message', '=', 'message.id')
        //             ->select('message.subject', 'message.message_text', 'message.create_date', 'message.sender')
        //             ->orderBy('message.create_date', 'desc')
        //             ->get();
        // // return $emails;
        $menus = Menu::all();

        // Get the current user
        $user = Auth::user();

        // Retrieve messages sent to the current user
        $messages = $user->receivedMessages()->with(['category', 'sender'])->get();
        // Mengirim data email ke view inbox
        return view('admin.Email.inbox', compact('messages', 'menus'));
    }
    public function detail($id)
    {
        // Mengambil data email berdasarkan ID
        $email = Message::where('id', $id)->firstOrFail();

        // Mengirim data email ke view detail
        return view('admin.Email.detail', ['email' => $email]);
    }
    public function reply(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'reply_message' => 'required|string|max:1000',
        ]);

        // Mengambil email yang akan dibalas berdasarkan ID
        $email = Message::findOrFail($id);

        // Membuat email baru sebagai balasan
        $reply = new Message();
        $reply->sender = Auth::user()->email; // Pengirim balasan (user yang login)
        $reply->message_text = $request->reply_message; // Pesan balasan dari form
        $reply->create_by = Auth::user()->name;
        $reply->create_date = now();
        $reply->save();

        // Simpan penerima balasan ke tabel MESSAGE_TO
        $messageTo = new MessageTo();
        $messageTo->id_message = $reply->id;
        $messageTo->to = $email->sender; // Balasan dikirim ke pengirim asli
        $messageTo->create_by = Auth::user()->name;
        $messageTo->create_date = now();
        $messageTo->save();

        // Kembali ke halaman detail dengan pesan sukses
        return redirect()->route('email.detail', ['id' => $id])->with('success', 'Balasan berhasil dikirim.');
    }
}
