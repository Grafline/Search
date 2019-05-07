<?php

namespace Grafline\Search;


use App\Good;

class Search
{
    protected $paginate;

    function __construct($paginate=12)
    {
        $this->paginate = $paginate;
    }

    public function getSaearch($request){
        $key = $request->input('search');
        $query = Good::choose()
            ->active()
            ->search($key);
            return $query->paginate($this->paginate);
    }

}
