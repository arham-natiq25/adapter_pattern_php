<?php

// let this class we get from facebook
class Facebook {
    function posttoWallChanged($message) {
        echo "posting message,\n"; 
        echo $message;
    }

}
// this is the inteface which  force to implement using your code 
interface SocialMediaAdapter {
    public function post($message) ; 
}


class FacebooAdapter implements SocialMediaAdapter {

    private $facebook;

    public function __construct( Facebook $facebook) {
        $this->facebook =$facebook ;
    }
    function post($message) {
        $this->facebook->posttoWallChanged($message);
    }

}
function getMessageFromUser() {
    return "user called";
}

$facebook = new FacebooAdapter(new Facebook());
$message = getMessageFromUser();
$facebook->post($message);