#include <FirebaseArduino.h>
#include <ESP8266WiFi.h>

#define WIFI_SSID "SLT_FIRE"
#define WIFI_PASSWORD "dhk@1998"

//this firebase project was deleted
//you'll need to enter your own firebase info
#define FIREBASE_HOST "carpark-93115.firebaseio.com"
#define FIREBASE_AUTH "LZ89RActVNwpgsYMtTQAmbNzMGMkZ51RteHUb3P5"

int ledPower = 5;

void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);

  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
  Serial.print("connecting");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    delay(500);
  }
  Serial.println();
  Serial.print("connected: ");
  Serial.println(WiFi.localIP());

  Firebase.begin(FIREBASE_HOST, FIREBASE_AUTH);
  pinMode(ledPower, OUTPUT);
}

void loop() {
  // put your main code here, to run repeatedly:
  int ledStatus = Firebase.getInt("slot01");
  Serial.println(ledStatus);

  //set data:
  Firebase.set("slot01", 1);
}
