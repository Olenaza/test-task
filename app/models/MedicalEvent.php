<?php

use Illuminate\Database\Eloquent\Model;

class MedicalEvent extends Model  {

    protected $table = 'medical_events';

    protected $guarded = array('id');

    public $errors;

    public static $rules = [
        'event_title' => 'required',
        'start_date' => 'required|date|date_format:d-m-Y',
        'start_time' => ['required', 'regex:/^([0-1]?[0-9]|2[0-3]):[0-5][0-9]$/'],
        'event_description' => 'required',
    ];

    /**
     * Validates medical event data
     *
     * @return bool
     */
    public function isValid($data)
    {
        $validation = Validator::make($data, static::$rules);

        if ($validation->fails()) {
            $this->errors = $validation->messages();
            return false;
        }

        return true;
    }
}
