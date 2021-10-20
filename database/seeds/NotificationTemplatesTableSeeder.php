<?php

use Illuminate\Database\Seeder;

class NotificationTemplatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('notification_templates')->delete();

        \DB::table('notification_templates')->insert(array (
            0 =>
            array (
                'id' => 2,
                'title' => 'New badge',
                'template' => '<p>Congratilations! You received [u.b.title]&nbsp;badge.</p>',
            ),
            1 =>
            array (
                'id' => 3,
                'title' => 'Your user group changed',
                'template' => '<p>Your user group changed to [u.g.title] .</p>',
            ),
            2 =>
            array (
                'id' => 4,
                'title' => 'Your class created',
                'template' => '<p>Your class [c.title] successfully created. It will be published after approval.</p>',
            ),
            3 =>
            array (
                'id' => 5,
                'title' => 'Your class approved',
                'template' => '<p>Your class [c.title] successfully approved. Now you can find it on the website.</p>',
            ),
            4 =>
            array (
                'id' => 6,
                'title' => 'Your class rejected',
                'template' => '<p>Sorry, Your class [c.title] rejected because it doesn\'t meet requirements or is against the community rules.</p>',
            ),
            5 =>
            array (
                'id' => 7,
                'title' => 'New comment for your class',
                'template' => '<p>[u.name] left a new comment on your class [c.title] .</p>',
            ),
            6 =>
            array (
                'id' => 8,
                'title' => 'New class support message',
                'template' => '<p>user [u.name] send new support message for course with title [c.title] .</p>',
            ),
            7 =>
            array (
                'id' => 9,
                'title' => 'New reply on support conversation',
                'template' => '<p>New reply on a support conversation on your class [c.title] support.</p>',
            ),
            8 =>
            array (
                'id' => 10,
                'title' => 'New support ticket',
                'template' => '<p>New support ticket received with subject [s.t.title] .</p>',
            ),
            9 =>
            array (
                'id' => 11,
                'title' => 'New reply on support ticket',
                'template' => '<p>The support ticket with the subject [s.t.title] updated with a new reply.</p>',
            ),
            10 =>
            array (
                'id' => 12,
                'title' => 'New financial document',
                'template' => '<p>&nbsp;New financial document submitted for your class [c.title] with type [f.d.type] and amount [amount] .</p>',
            ),
            11 =>
            array (
                'id' => 13,
                'title' => 'New payout request',
                'template' => '<p>New payout request received with the amount [payout.amount] . You can manage it using the admin panel.</p>',
            ),
            12 =>
            array (
                'id' => 14,
                'title' => 'Payout has been processed',
                'template' => 'Your payout has been processed with the amount [payout.amount]&nbsp;&nbsp;to your account [payout.account] .',
            ),
            13 =>
            array (
                'id' => 15,
                'title' => 'New sales',
                'template' => '<p>Congratulations! There is a new sales for your class [c.title] .</p>',
            ),
            14 =>
            array (
                'id' => 16,
                'title' => 'New purchase completed',
                'template' => '<p>The class [c.title] successfully purchased. Now you can start learning.</p>',
            ),
            15 =>
            array (
                'id' => 17,
                'title' => 'New feedback',
                'template' => '<p>Your class [c.title] received a [rate.count] stars rating from [student.name] .</p>',
            ),
            16 =>
            array (
                'id' => 18,
                'title' => 'Offline payment submitted',
                'template' => '<p>An offline payment request with the amount [amount] submitted successfully.</p>',
            ),
            17 =>
            array (
                'id' => 19,
                'title' => 'Offline payment approved',
                'template' => '<p>Offline payment request with the amount [amount] successfully approved.</p>',
            ),
            18 =>
            array (
                'id' => 20,
                'title' => 'Offline payment rejected',
                'template' => '<p>Sorry, offline payment request with the amount [amount]&nbsp;rejected.</p>',
            ),
            19 =>
            array (
                'id' => 21,
                'title' => 'Subscription plan activated',
                'template' => '<p>[s.p.name] subscription package activated by user [u.name] .</p>',
            ),
            20 =>
            array (
                'id' => 22,
                'title' => 'New meeting request',
                'template' => '<p>New meeting booked by [u.name] for [time.date] with the amount [amount] .</p>',
            ),
            21 =>
            array (
                'id' => 23,
                'title' => 'New meeting join URL',
                'template' => '<p>The reserved meeting join URL created by [instructor.name]. Join the meeting on [time.date] using this URL: [link] .</p>',
            ),
            22 =>
            array (
                'id' => 24,
                'title' => 'Meeting reminder',
                'template' => '<p>You have a meeting on [time.date] . Don\'t forget to join it on time.</p>',
            ),
            23 =>
            array (
                'id' => 25,
                'title' => 'Meeting finished',
                'template' => '<p>The meeting finished. Instructor: [instructor.name] Student:&nbsp; [student.name]&nbsp; Meeting time: [time.date] .</p>',
            ),
            24 =>
            array (
                'id' => 26,
                'title' => 'New contact message',
                'template' => '<p>New contact message with title [c.u.title] received from [u.name] .</p>',
            ),
            25 =>
            array (
                'id' => 27,
                'title' => 'Live class reminder',
                'template' => '<p>Your live class [c.title] will be conducted on [time.date] . Join it on time.</p>',
            ),
            26 =>
            array (
                'id' => 28,
                'title' => 'Promotion plan activated',
                'template' => '<p>Promotion plan [p.p.name]&nbsp;&nbsp;activated for the call [c.title] .</p>',
            ),
            27 =>
            array (
                'id' => 29,
                'title' => 'Promotion plan purchased',
                'template' => '<p>There is new request for activating [p.p.name] for class [c.title] .&nbsp;</p>',
            ),
            28 =>
            array (
                'id' => 30,
                'title' => 'New certificate',
                'template' => '<p>You achieved a new certificate for [c.title] . You can download it from the class page or your panel.</p>',
            ),
            29 =>
            array (
                'id' => 31,
                'title' => 'New pending quiz',
                'template' => '<p>[student.name] passed [q.title] quiz of the [c.title] class and waiting for correction to get results.</p>',
            ),
            30 =>
            array (
                'id' => 32,
                'title' => 'Waiting quiz result',
                'template' => '<p>Your pending quiz corrected and your result is [q.result] for [q.title] quiz of [c.title] class.</p>',
            ),
            31 =>
            array (
                'id' => 33,
                'title' => 'New comment',
                'template' => '<p>[u.name] left a new comment and waiting for approval.</p>',
            ),
            32 =>
            array (
                'id' => 34,
                'title' => 'Payout request submitted',
                'template' => '<p>Your payout request successfully submitted for [payout.amount] . You will receive an email when processed.</p>',
            ),
        ));


    }
}