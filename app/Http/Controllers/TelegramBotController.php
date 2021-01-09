<?php

namespace FYP\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramBotController extends Controller
{
    public function updatedActivity()
    {
        $activity = Telegram::getUpdates();
        dd($activity);
    }
    public function sendMessage()
    {
        return view('/admins.sendmsg');
    }

    public function storeMessage(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);

        $text = "ATTENTION\n"
            . "<b>Just a soft reminder for appointment on the next day.</b>\n"
            . "$request->subject\n"
            . "<b>Message: </b>\n"
            . $request->message;

        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001416503774'),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);

        return redirect()->back();
    }
}
