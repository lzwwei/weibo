<?php

namespace app\Admin\Controllers;

use App\Admin\Forms\Settings;
use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Tab;

class SettingsController extends Controller
{
    public function settings(Content $content)
    {
        $forms = [
            'basic'    => Settings\Basic::class,
            'site'     => Settings\Site::class,
            'upload'   => Settings\Upload::class,
            'database' => Settings\Database::class,
            'develop'  => Settings\Develop::class,
        ];

        return $content
            ->title('系统设置')
            ->body(Tab::forms($forms));
    }
}