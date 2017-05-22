<?php

class MedicalEventController extends \BaseController {

    const DATE_FORMAT = 'd-m-Y';

    const TIME_FORMAT = 'H:i';

    const DATETIME_FORMAT = 'd-m-Y H:i';

    protected $medicalEvent;

    public function __construct(MedicalEvent $medicalEvent)
    {
        return $this->medicalEvent = $medicalEvent;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $medicalEvents = $this->medicalEvent
            ->where([
                'user_id' => Auth::user()->id,
            ])
            ->orderBy('event_start', 'desc')
            ->get();

        return View::make('events.list', array('events' => $medicalEvents));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('events.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        if (! $this->medicalEvent->isValid(Input::all())) {
            return Redirect::back()->withInput()->withErrors($this->medicalEvent->errors);
        }

        $this->medicalEvent->create([
            'event_title' => Input::get('event_title'),
            'event_start' => $this->createDateTime(Input::get('start_date'), Input::get('start_time')),
            'event_description' => Input::get('event_description'),
            'user_id' => Auth::user()->id,
        ]);

        return Redirect::route('events.index')->with('message', 'Event has been successfully created');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $medicalEvent = $this->medicalEvent->whereId($id)->first();

        if (null === $medicalEvent) {
            return Redirect::route('events.index')->with('message', 'Event not found');
        }

        $medicalEvent->start_date = $this->getDateFromDateTime($medicalEvent->event_start);
        $medicalEvent->start_time = $this->getTimeFromDateTime($medicalEvent->event_start);

        return View::make('events.edit', [
            'event' => $medicalEvent,
        ]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        if (! $this->medicalEvent->isValid(Input::all())) {
            return Redirect::back()->withInput()->withErrors($this->medicalEvent->errors);
        }

        $medicalEvent = $this->medicalEvent->whereId($id)->first();

        $medicalEvent->update([
            'event_title' => Input::get('event_title'),
            'event_start' => $this->createDateTime(Input::get('start_date'), Input::get('start_time')),
            'event_description' => Input::get('event_description'),
            'user_id' => Auth::user()->id,
        ]);

        return Redirect::route('events.index')->with('message', 'Event has been updated');


	}

    /**
     * Create DateTime from strings containing date and time
     *
     * @param $startDate
     * @param $startTime
     * @return DateTime
     */
    private function createDateTime($startDate, $startTime)
    {
        return DateTime::createFromFormat(
            self::DATETIME_FORMAT,
            $startDate.' '.$startTime
        );
    }

    /**
     * Get string containing date from datetime string
     *
     * @param $dateTime
     * @return string
     */
    private function getDateFromDateTime($dateTime)
    {
        return (new DateTime($dateTime))->format(self::DATE_FORMAT);
    }

    /**
     * Get string containing time from datetime string
     *
     * @param $dateTime
     * @return string
     */
    private function getTimeFromDateTime($dateTime)
    {
        return (new DateTime($dateTime))->format(self::TIME_FORMAT);
    }
}
