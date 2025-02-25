<?php

class Person {
    private $data = [
        'name' => 'Ali',
        'age' => 25,
    ];

    // يتم استدعاؤه عند محاولة الوصول إلى خاصية غير معرفة أو خاصة
    public function __get($property) {
        if (array_key_exists($property, $this->data)) {
            return $this->data[$property];
        }
        return "Property '{$property}' not found!";
    }

    // يتم استدعاؤه عند تعيين قيمة لخاصية غير معرفة أو خاصة
    public function __set($property, $value) {
        $this->data[$property] = $value;
        echo "Property '{$property}' set to '{$value}'\n";
    }

    // يتم استدعاؤه عند استدعاء دالة غير معرفة على الكائن
    public function __call($method, $args) {
        echo "Method '{$method}' is not defined!\n";
    }

    // يتم استدعاؤه عند استدعاء دالة ثابتة غير معرفة
    public static function __callStatic($method, $args) {
        echo "Static method '{$method}' is not defined!\n";
    }

    // يتم استدعاؤه عند استنساخ الكائن
    public function __clone() {
        $this->data['name'] = "Clone of " . $this->data['name'];
    }

    // يتم استدعاؤه عند استدعاء الكائن كدالة
    public function __invoke($message) {
        echo "Log: " . $message . "\n";
    }

    // يتم استدعاؤه عند محاولة طباعة الكائن
    public function __toString() {
        return "Person: " . json_encode($this->data);
    }
}


$person1 = new Person();
echo $person1->name . "\n";

$person1->age = 30; 
echo $person1->age . "\n"; 

$person1->email = "ali@example.com"; 
echo $person1->email . "\n"; 

$person1->undefinedMethod(); 

Person::staticMethod(); 

$person2 = clone $person1;
echo $person2->name . "\n";

$person1("This is a log message!"); 

echo $person1; 

?>
