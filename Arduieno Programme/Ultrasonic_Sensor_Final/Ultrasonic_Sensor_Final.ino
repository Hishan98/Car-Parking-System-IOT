#include <ESP8266WiFi.h>
#include <FirebaseArduino.h>

#define WIFI_SSID "SLT_FIRE" // WiFi Name
#define WIFI_PASSWORD "dhk@1998" // WiFi Password

#define FIREBASE_HOST "carpark-93115.firebaseio.com" // RealTime Database URL
#define FIREBASE_AUTH "LZ89RActVNwpgsYMtTQAmbNzMGMkZ51RteHUb3P5" // Realtime Database Secret

// First Sensor pin numbers
const int trigPin = 4;  // D4 - NodeMCU pin 
const int echoPin = 5;  // D3 - NodeMCU pin

// Second Sensor pin numbers
const int trigPinSe = 2;  // D2 - NodeMCU pin
const int echoPinSe = 0;  // D1 - NodeMCU pin

// defines variables
long duration;
int distance;
int available_range = 10; // Maximum distance between sensor and the object to change available state to unavailable 

void setup() {
  Serial.begin(9600);

  WiFi.begin(WIFI_SSID, WIFI_PASSWORD); //Connecting to the WiFi
  Serial.print("connecting");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print("."); //
    delay(500);
  }
  Serial.println();
  Serial.print("connected: ");
  Serial.println(WiFi.localIP()); //Print Local IP address

  Firebase.begin(FIREBASE_HOST, FIREBASE_AUTH); //Connecting to the firebase
  
  pinMode(trigPin, OUTPUT); // Sets the FIrst sensor trigPin as an Output
  pinMode(echoPin, INPUT); // Sets the First sensor echoPin as an Input
  pinMode(trigPinSe, OUTPUT); // Sets the Second sensor trigPin as an Output
  pinMode(echoPinSe, INPUT); // Sets the Second sensor echoPin as an Input
}

void loop() {
  Water_system(trigPin,echoPin,duration,distance,available_range); // Check First Sensor Data and update Firebase database
  Water_system(trigPinSe,echoPinSe,duration,distance,available_range); // Check Second Sensor Data and update Firebase database
}

int Water_system(int trigPin,int echoPin,int distance,long duration, int available_range){
  
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
  
  // Check which sensor (sensor 01 /sensor 02) from trigger pin
  if(trigPin==4){
    Serial.print("Distance: ");
    Serial.print(distance);
    Serial.println(" cm");

    // Check Sensor distance with the object
    if(distance>available_range){
      Firebase.set("slot01", 0); // update slot01 in firebase database if sensor distance is greater than available_range
    }
    else{
      Firebase.set("slot01", 1); // update slot01 in firebase database if sensor distance is lesser than available_range
    }
    
    delay(500); 
  }
  else{
    Serial.print("Second sensor Distance: ");
    Serial.print(distance);
    Serial.println(" cm");

    // Check Sensor distance with the object
    if(distance>available_range){
      Firebase.set("slot02", 0); // update slot02 in firebase database if sensor distance is greater than available_range
    }
    else{
      Firebase.set("slot02", 1); // update slot02 in firebase database if sensor distance is lesser than available_range
    }
    
    delay(500); 
  }
  
}
