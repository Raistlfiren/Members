<?php

namespace Bolt\Extension\Bolt\Members\Storage\Schema\Table;

use Bolt\Storage\Database\Schema\Table\BaseTable;

/**
 * Account table.
 *
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
class Account extends BaseTable
{
    /**
     * @inheritDoc
     */
    protected function addColumns()
    {
        $this->table->addColumn('guid',        'guid',       []);
        $this->table->addColumn('email',       'string',     ['length'  => 128]);
        $this->table->addColumn('displayname', 'string',     ['length'  => 32, 'notnull' => false]);
        $this->table->addColumn('enabled',     'boolean',    ['default' => 0]);
        $this->table->addColumn('roles',       'json_array', ['length'  => 1024, 'notnull' => false]);
        $this->table->addColumn('lastseen',    'datetime',   ['default' => '']);
        $this->table->addColumn('lastip',      'string',     ['length'  => 32, 'notnull' => false]);
    }

    /**
     * @inheritDoc
     */
    protected function addIndexes()
    {
        $this->table->addUniqueIndex(['email']);

        $this->table->addIndex(['enabled']);
    }

    /**
     * @inheritDoc
     */
    protected function setPrimaryKey()
    {
        $this->table->setPrimaryKey(['guid']);
    }
}