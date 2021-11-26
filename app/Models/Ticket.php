<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    public function isValid()
    {
        $ticket = $this;
        $valid = false;

        $now = now();
        $startDate = Carbon::parse($this->start_date)->startOfDay()->addDay(1);
        $endDate = Carbon::parse($this->end_date)->endOfDay()->addDay(1);

        if ($now->isAfter($startDate) && $now->isBefore($endDate)) {

            $valid = true;

        }

        if ($ticket->capacity) {
            $ticketUserCount = TicketUser::where('ticket_id', $ticket->id)->count();

            if ($ticketUserCount and $ticket->capacity <= $ticketUserCount) {
                $valid = false;
            }
        }

        return $valid;
    }

    public function getSubTitle()
    {
        $title = '';

        if (!empty($this->end_date) and !empty($this->capacity)) {
            $title = trans('public.ticket_for_students_until_date', ['students' => $this->capacity, 'date' => dateTimeFormat($this->end_date, 'j F Y')]);
        } elseif (!empty($this->end_date)) {
            $title = trans('public.ticket_until_date', ['date' => dateTimeFormat($this->end_date, 'j F Y')]);
        }

        return $title;
    }
}
