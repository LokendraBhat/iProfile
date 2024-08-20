<?php
class PHP_Email_Form {

    public $to;
    public $from_name;
    public $from_email;
    public $subject;
    public $smtp = false; // For future SMTP integration
    public $ajax = false;
    private $messages = array();

    public function add_message($message, $label = '', $priority = 10) {
        $this->messages[] = array(
            'message' => $message,
            'label' => $label,
            'priority' => $priority
        );
    }

    public function send() {
        $headers = "From: " . $this->from_name . " <" . $this->from_email . ">\r\n";
        $headers .= "Reply-To: " . $this->from_email . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        $email_body = "";
        foreach ($this->messages as $message) {
            $email_body .= $message['label'] . ": " . $message['message'] . "\n";
        }

        // Send email
        if (mail($this->to, $this->subject, $email_body, $headers)) {
            return 'Your message has been sent successfully!';
        } else {
            return 'There was an error sending your message.';
        }
    }
}
?>
