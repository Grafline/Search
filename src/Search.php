<?php

namespace Grafline\Search;


use Illuminate\Foundation\Validation\ValidatesRequests;

class Search
{
    protected $paginate;
    protected $object;
    protected $key;

    use ValidatesRequests;

    function __construct($object, $paginate=12)
    {
        $this->paginate = $paginate;
        $this->object = $object;
        $this->object->localSearchable();
    }

    public function getSaearch($request){

        $this->validate($request, ['search' => 'required|min:3']);

        $key = $request->input('search');
        $this->key = $key;
        $query = $this->object->active()
            ->search($key, null, true);
            return $query->paginate($this->paginate);
    }

    public function requestSearch(){
        return $this->key;
    }

}
