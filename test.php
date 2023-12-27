<?php



// Adaptee class with an existing interface
class Adaptee {
    private $state;

    public function __construct($initialState) {
        $this->state = $initialState;
    }

    public function specificRequest() {
        // Adding some conditional logic to Adaptee
        if ($this->state === 'positive') {
            return "Positive request from Adaptee.";
        } elseif ($this->state === 'negative') {
            return "Negative request from Adaptee.";
        } else {
            return "Default request from Adaptee.";
        }
    }
}

// Target interface expected by the client
interface Target {
    public function request();
}

// Adapter class that implements the Target interface
class Adapter implements Target {
    private $adaptee;

    public function __construct(Adaptee $adaptee) {
        $this->adaptee = $adaptee;
    }

    public function request() {
        // Using the specificRequest method of Adaptee
        // Modifying the Adapter to handle different cases
        $result = $this->adaptee->specificRequest();

        // Adding some additional logic in the Adapter
        if (strpos($result, 'Positive') !== false) {
            $result .= " (Converted to positive in Adapter)";
        } elseif (strpos($result, 'Negative') !== false) {
            $result .= " (Converted to negative in Adapter)";
        }

        return $result;
    }
}

// Client code using the Target interface
function clientCode(Target $target) {
    return $target->request();
}

// Using the Adapter to make Adaptee compatible with Target
// $adaptee = 'negative'; // Change the state to 'negative' or any other value to see different cases
$adapter = new Adapter(new Adaptee('negative'));


// Client code can now work with Adaptee through the Target interface
$result = clientCode($adapter);

// Output the result
echo $result;
