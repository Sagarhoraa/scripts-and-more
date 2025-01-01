<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Records</title>
</head>
<body>
  <h2>Student Records</h2>
  <table border="1">
    <thead>
      <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Student ID</th>
      </tr>
    </thead>
    <tbody>
      <?php
        // Define the Person class
        class Person {
          public $name;
          public $age;

          public function __construct($name, $age) {
            $this->name = $name;
            $this->age = $age;
          }

          public function display() {
            return "Name: {$this->name}, Age: {$this->age}";
          }
        }

        // Define the Student class that extends Person
        class Student extends Person {
          public $studentId;

          public function __construct($name, $age, $studentId) {
            parent::__construct($name, $age);
            $this->studentId = $studentId;
          }

          public function display() {
            return "Name: {$this->name}, Age: {$this->age}, Student ID: {$this->studentId}";
          }
        }

        // Create an array of Student objects
        $students = [
          new Student('John Doe', 20, 'S001'),
          new Student('Jane Smith', 22, 'S002'),
          new Student('Alice Johnson', 19, 'S003'),
          new Student('Bob Brown', 21, 'S004')
        ];

        // Save student data to a string (simulating file write)
        $studentData = '';
        foreach ($students as $student) {
          $studentData .= $student->display() . "\n";
        }

        // Write student data to a file
        file_put_contents('student.txt', $studentData);

        // Read from the file and display in table
        $rows = file('student.txt');
        foreach ($rows as $row) {
          $cells = explode(', ', trim($row));
          echo '<tr>';
          foreach ($cells as $cell) {
            list(, $value) = explode(': ', $cell);
            echo "<td>{$value}</td>";
          }
          echo '</tr>';
        }
      ?>
    </tbody>
  </table>
</body>
</html>
