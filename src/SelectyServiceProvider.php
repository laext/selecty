<?php

namespace Laext\Selecty;

use Encore\Admin\Admin;
use Encore\Admin\Form;
use Illuminate\Support\ServiceProvider;

class SelectyServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(SelectyExtension $extension)
    {
        if (! SelectyExtension::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'laext-selecty');
        }   
        
        Admin::booting(function () {
            Form::extend('selecty', Selecty::class);
        });
    }
}