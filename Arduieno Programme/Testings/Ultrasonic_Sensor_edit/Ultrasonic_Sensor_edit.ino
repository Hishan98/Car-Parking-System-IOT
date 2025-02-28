// defines pins numbers
const int trigPin = 2;  //D4
const int echoPin = 0;  //D3
const int trigPinSe = 4;  //D6
const int echoPinSe = 5;  //D5

// defines variables
long duration;
int distance;
long durationSe;
int distanceSe;

void setup() {
pinMode(trigPin, OUTPUT); // Sets the trigPin as an Output
pinMode(echoPin, INPUT); // Sets the echoPin as an Input
pinMode(trigPinSe, OUTPUT); // Sets the trigPin as an Output
pinMode(echoPinSe, INPUT); // Sets the echoPin as an Input
Serial.begin(9600); // Starts the serial communication
}

void loop() {
// Clears the trigPin
digitalWrite(trigPin, LOW);
delayMicroseconds(2);
digitalWrite(trigPinSe, LOW);
delayMicroseconds(2);

// Sets the trigPin on HIGH state for 10 micro seconds
digitalWrite(trigPin, HIGH);
digitalWrite(trigPinSe, HIGH);
delayMicroseconds(10);
digitalWrite(trigPin, LOW);
digitalWrite(trigPinSe, LOW);

// Reads the echoPin, returns the sound wave travel time in microseconds
duration = pulseIn(echoPin, HIGH);
durationSe = pulseIn(echoPinSe, HIGH);
// Calculating the distance
distance= duration*0.034/2;
distanceSe= durationSe*0.034/2;
// Prints the distance on the Serial Monitor

Serial.print("Distance: ");
Serial.println(distance);
Serial.print("Second sensor Distance: ");
Serial.println(distanceSe);
delay(2000);
}

