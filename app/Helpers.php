<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Helpers
{
	public function inRoute($router)
	{
		$action = false;
		$routeName = \Request::route()->getName();

		if (is_string($router)) {
			$action = $router === $routeName;
		}

		if (is_array($router)) {
			foreach ($router as $route) {
				if ($route === $routeName) {
					$action = true;
					break;
				}
			}
		}

		return $action;
	}

	public static function flash($message = 'The operation has successfully been executed.', $title = 'Success', $type = 'success')
	{
		session()->flash('success', true);
        session()->flash('status_message', [
            'title' => $title,
            'message' => $message,
            'type' => $type,
        ]);
	}

	public static function storeUserImage($page, Request $request, array $vars, string $column = 'image_path') {
		$user = \Auth::user();

		if ($user) {
			$path = $user->renderUserDirectory();
		}

		if($request->hasFile($column)) {
            if ($page->$column) {
                Storage::delete('public/' . $page->$column);
            }

            $vars[$column] = $request->file($column)->store($path, 'public');
        }

        return $vars;
	}
}