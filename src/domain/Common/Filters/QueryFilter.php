<?php

namespace Domain\Common\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

abstract class QueryFilter {

    /** @var Request  */
    protected $request;

    /** @var Builder */
    protected $builder;

    /**
     * QueryFilter constructor.
     * @param Request $request
     */
    public function __construct(Request $request) {
        $this->request = $request;
    }

    /**
     * @param Builder $builder
     */
    public function apply(Builder $builder): void {
        $this->builder = $builder;

        foreach ($this->fields() as $field => $value) {
            $method = Str::camel($field);

            if (method_exists($this, $method)) {
                call_user_func_array([$this, $method], (array)$value);
            }
        }

        if (!$this->request->has('sort')) {
            $this->builder->orderBy('id', 'asc');
        }
    }

    /**
     * @return array
     */
    protected function fields(): array {
        return array_filter(
            array_map('trim', $this->request->all())
        );
    }

    /**
     * @param string $value
     */
    protected function sort(string $value): void {
        collect(explode(',', $value))->mapWithKeys(function (string $field) {
            switch (substr($field, 0, 1)) {
                case '-':
                    return [substr($field, 1) => 'desc'];
                case ' ':
                    return [substr($field, 1) => 'asc'];
                default:
                    return [$field => 'asc'];
            }
        })->each(function (string $order, string $field) {
            $this->builder->orderBy($field, $order);
        });
    }
}
