<?php

$prefix = Config::get('fluxbb.route_prefix', '');

Route::group(array('prefix' => $prefix, 'before' => 'fluxbb_is_installed'), function () {
    $actionRoute = function ($actionClass) {
        return function () use ($actionClass) {
            $action = App::make($actionClass);
            return $action->handle(app('request'));
        };
    };

    Route::get('forum/{id}', array('as' => 'viewforum', 'uses' => $actionRoute('FluxBB\Actions\ViewForum')));
    Route::get('topic/{id}', array('as' => 'viewtopic', 'uses' => $actionRoute('FluxBB\Actions\ViewTopic')));
    Route::get('post/{id}', array('as' => 'viewpost', 'uses' => $actionRoute('FluxBB\Actions\ViewPost')));
    Route::get('/', array('as' => 'index', 'uses' => $actionRoute('FluxBB\Actions\Home')));
    Route::get('profile/{id}', array('as' => 'profile', 'uses' => $actionRoute('FluxBB\Actions\ProfilePage')));
    Route::get('users', array('as' => 'userlist', 'uses' => $actionRoute('FluxBB\Actions\UsersPage')));

    Route::get('register', array('as' => 'register', 'uses' => $actionRoute('FluxBB\Actions\RegisterPage')));
    Route::post('register', $actionRoute('FluxBB\Actions\Register'));
    Route::get('login', array('as' => 'login', 'uses' => $actionRoute('FluxBB\Actions\LoginPage')));
    Route::post('login', $actionRoute('FluxBB\Actions\Login'));
    Route::get('reset_password', array('as' => 'reset_password', 'uses' => $actionRoute('FluxBB\Actions\PasswordResetPage')));
    Route::get('logout', array('as' => 'logout', 'uses' => $actionRoute('FluxBB\Actions\Logout')));
    Route::get('rules', array('as' => 'rules', 'uses' => $actionRoute('FluxBB\Actions\Rules')));
    Route::get('search', array('as' => 'search', 'uses' => $actionRoute('FluxBB\Actions\SearchPage')));
    Route::get('post/{id}/report', array(
        'as'	=> 'post_report',
        'uses'	=> 'FluxBB\Controllers\PostingController@getReport',
    ));
    Route::get('post/{id}/delete', array(
        'as'	=> 'post_delete',
        'uses'	=> 'FluxBB\Controllers\PostingController@getDelete',
    ));
    Route::get('post/{id}/edit', array('as' => 'post_edit', 'uses' => $actionRoute('FluxBB\Actions\EditPostPage')));
    Route::post('post/{id}/edit', $actionRoute('FluxBB\Actions\EditPost'));
    Route::get('post/{id}/quote', array(
        'as'	=> 'post_quote',
        'uses'	=> 'FluxBB\Controllers\PostingController@getQuote',
    ));
    Route::get('topic/{id}/reply', array('as' => 'reply', 'uses' => $actionRoute('FluxBB\Actions\ReplyPage')));
    Route::post('topic/{id}/reply', $actionRoute('FluxBB\Actions\Reply'));
    Route::get('forum/{id}/topic/new', array('as' => 'new_topic', 'uses' => $actionRoute('FluxBB\Actions\NewTopicPage')));
    Route::post('forum/{id}/topic/new', $actionRoute('FluxBB\Actions\NewTopic'));

    Route::bind('group', function ($value, $route) {
        return App::make('FluxBB\Models\GroupRepositoryInterface')->find($value);
    });

    Route::group(array('before' => 'auth'), function () use ($actionRoute) {
        Route::get('admin', array('as' => 'admin', 'uses' => $actionRoute('FluxBB\Actions\Admin\DashboardPage')));

        Route::get('admin/groups', array(
            'as'	=> 'admin_groups_index',
            'uses'	=> 'FluxBB\Controllers\Admin\GroupsController@index',
        ));
        Route::get('admin/groups/{group}/edit', array(
            'as'	=> 'admin_groups_edit',
            'uses'	=> 'FluxBB\Controllers\Admin\GroupsController@edit',
        ));
        Route::get('admin/groups/{group}/delete', array(
            'as'	=> 'admin_groups_delete',
            'uses'	=> 'FluxBB\Controllers\Admin\GroupsController@delete',
        ));
        Route::post('admin/groups/{group}/delete', array(
            'uses'	=> 'FluxBB\Controllers\Admin\GroupsController@remove',
        ));

        Route::get('admin/settings', ['as' => 'admin_settings_global', 'uses' => $actionRoute('FluxBB\Actions\Admin\GlobalSettingsPage')]);
        Route::get('admin/settings/email', ['as' => 'admin_settings_email', 'uses' => $actionRoute('FluxBB\Actions\Admin\EmailSettingsPage')]);
        Route::get('admin/settings/maintenance', ['as' => 'admin_settings_maintenance', 'uses' => $actionRoute('FluxBB\Actions\Admin\MaintenanceSettingsPage')]);
        Route::post('admin/settings/{key}', array(
            'uses'  => 'FluxBB\Controllers\Admin\SettingsController@setOption'
        ));

        Route::post('admin/ajax/board_config', array(
            'as'    => 'admin_ajax_board_config',
            'uses'  => 'FluxBB\Controllers\Admin\AjaxController@postBoardConfig',
        ));

        /* Route::get('admin/settings/logs', array(
            'as' => 'admin_settings_logs',
            'uses' => 'FluxBB\Controllers\Admin\SettingsController@getLogs',
        ));
        */

        Route::get('admin/dashboard/updates', ['as' => 'admin_dashboard_updates', 'uses' => $actionRoute('FluxBB\Actions\Admin\UpdatesPage')]);
        Route::get('admin/dashboard/stats', ['as' => 'admin_dashboard_stats', 'uses' => $actionRoute('FluxBB\Actions\Admin\StatsPage')]);
        Route::get('admin/dashboard/reports', ['as' => 'admin_dashboard_reports', 'uses' => $actionRoute('FluxBB\Actions\Admin\ReportsPage')]);
    });


});
