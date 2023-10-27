<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfNotFound
{
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra xem đường link có tồn tại hay không
        if (!$this->isValidRoute($request)) {
            return redirect('/');
        }

        return $next($request);
    }

    private function isValidRoute(Request $request)
    {
        // Kiểm tra xem đường link có tồn tại hay không
        // Trả về true nếu đường link tồn tại và false nếu không tồn tại
        // Bạn có thể thay đổi phương thức kiểm tra tùy theo yêu cầu của ứng dụng

        // Ví dụ kiểm tra có thể dùng:
        // return \Route::has($request->route()->getName());

        // Hoặc:
        // return \Route::getRoutes()->has($request->path());

        // Trong ví dụ này, tôi sẽ trả về false luôn để giả sử đường link không tồn tại
        return false;
    }
}
