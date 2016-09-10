<?php

namespace App\Providers;

use App\Policies\EditPolicy;
use App\Models\ProblemForm;
use App\Models\InvestorForm;
use App\Models\ProjectForm;
use App\Models\ExecutorForm;
use App\Models\WorkForm;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        InvestorForm::class=>EditPolicy::class,
        ProblemForm::class=>EditPolicy::class,
        ProjectForm::class=>EditPolicy::class,
        ExecutorForm::class=>EditPolicy::class,
        EmployerForm::class=>EditPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
