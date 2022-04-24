<?php

namespace App\Http\Middleware;
use App\Models\Category;
use Closure;
use Illuminate\Http\Request;
use Session;
class VerifyCategoriesCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Category::all()->count() === 0){
            Session::flash('error', 'Please add category first to enable add posts!');
            return redirect()->back();
        }
        
        return $next($request);
    }
}
