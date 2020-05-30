// defines pins numbers
const int trigPin = 2;  //D4
const int echoPin = 0;  //D3
const int trigPinSe = 4;  //D6
const int echoPinSe = 5;  //D5

// defines variables
long duration;
int distance;

void setup() {
pinMode(trigPin, OUTPUT); // Sets the trigPin as an Output
pinMode(echoPin, INPUT); // Sets the echoPin as an Input
pinMode(trigPinSe, OUTPUT); // Sets the trigPin as an Output
pinMode(echoPinSe, INPUT); // Sets the echoPin as an Input
Serial.begin(9600); // Starts the serial communication
}

void loop() {
  Water_system(trigPin,echoPin,duration,distance);
//  delay(500);
  Water_system(trigPinSe,echoPinSe,duration,distance);
}

int Water_system(int trigPin,int echoPin,int distance,long duration){
  
  // Clears the trigPin
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  
  // Sets the trigPin on HIGH state for 10 micro seconds
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  
  // Reads the echoPin, returns the sound wave travel time in microseconds
  duration = pulseIn(echoPin, HIGH);
  
  // Calculating the distance
  distance= duration*0.034/2;
  // Prints the distance on the Serial Monitor
  if(trigPin==4){
    Serial.print("Distance: ");
    Serial.println(distance);
    delay(2000); 
  }
  else{
    Serial.print("Second sensor Distance: ");
    Serial.println(distance);
    delay(2000); 
  }
  
}

