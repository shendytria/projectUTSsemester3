<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $role = $user->id_jenis_user;

        $allowedRoutes = [
            1 => [
                'main',
                'dash',
                'regis.index',
                'index',
                'login',
                'logout',
                'dashboard',
                'buku',
                'kategori',
                'kategori.index',
                'addkategori',
                'buku.index',
                'addbuku',
                'users.index',
                'users.edit',
                'users.create',
                'users.store',
                'users.update',
                'users.delete',
                'admin.menu.index',
                'menu.create',
                'menu.store',
                'menu.show',
                'menu.edit',
                'menu.update',
                'menu.destroy',
                'JenisUser.index',
                'JenisUser.store',
                'kategori.add',
                'add_buku',
                'email.create',
                'email.send',
                'email.inbox',
                'email.detail',
                'email.reply'
            ], //Admin
            2 => [
                'main',
                'regis.index',
                'login',
                'logout',
                'dashboard',
                'buku',
                'kategori',
                'email.create',
                'email.send',
                'email.inbox',
                'email.detail',
                'email.reply'
            ], // Mahasiswa
            3 => [
                'main',
                'regis.index',
                'login',
                'logout',
                'dashboard',
                'buku',
                'kategori',
                'users.index',
                'users.edit',
                'users.create',
                'users.store',
                'users.update',
                'users.delete',
                'admin.menu.index',
                'menu.create',
                'menu.store',
                'menu.show',
                'menu.edit',
                'menu.update',
                'menu.destroy',
            ] // Dosen
        ];

        $routeName = $request->route()->getName();

        if (!in_array($routeName, $allowedRoutes[$role])) {
            return redirect()->route('main');
        }

        return $next($request);
    }
}
