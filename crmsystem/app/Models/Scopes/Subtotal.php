<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class Subtotal implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $sql = 'select p.id as id
        ,i.id as item_id
        ,ip.id as pivot_id
        ,i.price * ip.quantity as subtotal
        ,c.name as customer_name
        ,c.id as customer_id
        ,i.name as item_name
        ,i.price as item_price
        ,ip.quantity
        ,p.status
        ,p.created_at
        ,p.updated_at
        from purchases p
        left join item_purchase ip on p.id = ip.purchase_id
        left join items i on ip.item_id = i.id
        left join customers c on p.customer_id = c.id
        ';
        $builder->fromSub($sql, 'order_subtotals');
    }
}
