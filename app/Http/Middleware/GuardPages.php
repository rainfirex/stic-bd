<?php

namespace App\Http\Middleware;

use App\Models\Access;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class GuardPages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $urlString = $request->path();
        $urlPart = mb_split('/', $urlString);

        $isRead   = false;
        $isEdit   = false;
        $isDelete = false;

        $roleName = Auth::user()->role->name;
        $currentAccess = Access::where('prefix', $urlPart[0])->get(); //'placements'

        foreach ($currentAccess as $access) {
            if($roleName == $access->role->name) {
                list('is_read' => $isRead, 'is_edit' => $isEdit, 'is_delete' => $isDelete) = $access->role; //'is_read', 'is_edit', 'is_delete';
            }
        }

        switch ($request->getMethod()) {
            case 'GET':
                if (!$isRead)
                    return redirect('read-disabled');

                if (Request::is('*/delete/*')) {
                    if (!$isDelete) {
                        return redirect('delete-disabled');
                    }
                }

//                preg_match('/delete/', $request->path(),$matches);
//                if (!empty($matches) && $matches[0] === 'delete') {
//                    if (!$isDelete) {
//                        return redirect('delete-disabled');
//                    }
//                }

                break;
            case 'POST':
                if (!$isEdit)
                    return redirect('edit-disabled');
                break;
            case 'PUT':
                if (!$isEdit)
                    return redirect('edit-disabled');
                break;
            case  'DELETE':
                if (!$isDelete)
                    return redirect('delete-disabled');
                break;
        }
        return $next($request);
    }
}
