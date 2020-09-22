<?php
declare(strict_types=1);

namespace App\Tenant;


use App\Models\Account;
use Illuminate\Support\Facades\Schema;

class TenantManager
{
    private $tenant;

    /**
     * @return Account
     */
    public function getTenant(): ?Account
    {
        return $this->tenant;
    }

    /**
     * @param Account $tenant
     */
    public function setTenant(?Account $tenant): void
    {
        $this->tenant = $tenant;
        $this->makeTenantConnection();
    }

    private function makeTenantConnection()
    {
        $clone = config('database.connections.system');
        $clone['database'] = $this->tenant->database;
        \Config::set('database.connections.tenant', $clone);
        \DB::reconnect('tenant');
    }

    public function loadConnections()
    {
        if (Schema::hasTable((new Account())->getTable())) {
            $accounts = Account::all();
            foreach ($accounts as $account) {
                $clone = config('database.connections.system');
                $clone['database'] = $account->database;
                \Config::set("database.connections.{$account->domain}", $clone); //company1
            }
        }
    }

    public function isTenantRequest(){
        return !\Request::is('system/*') && \Request::route('prefix');
    }
}
