<?php

namespace Grafline\Search;


use App\Good;
use Illuminate\Foundation\Validation\ValidatesRequests;

class Search
{
    protected $paginate;

    use ValidatesRequests;

    function __construct($paginate=12)
    {
        $this->paginate = $paginate;
    }

    public function getSaearch($request){

        $this->validate($request, ['search' => 'required|min:3']);

        $key = $request->input('search');
        $query = Good::choose()
            ->active()
            ->search($key);
            return $query->paginate($this->paginate);
    }

}
