#include <OpenMG811.h>
#include <OpenMQ135.h>
#include <OpenMQ2.h>
#include <OpenGP2Y10.h>
#include <SoftwareSerial.h>

SoftwareSerial esp8266(2, 3);

OpenMQ2 mq2(A0);
OpenMQ135 mq135(A1);
OpenMG811 mg811(A2);
OpenGP2Y10 gp2(A3, 12);

#define DEBUG true
const String ssid = "BTT";
const String pass = "Kubot_2015";
const String ipserver = "192.168.0.101";

String sendESP8266(String ATCommand, int timeout, boolean debug)
{
  String response = "";

  esp8266.print(ATCommand);

  long int time = millis();

  while ( (time + timeout) > millis())
  {
    while (esp8266.available())
    {
      char c = esp8266.read();
      response += c;
    }
  }

  if (debug) {
    Serial.print(response);
  }
  return response;
}

void setup() {
  Serial.begin(9600);
  esp8266.begin(9600);

  sendESP8266("AT+RST\r\n", 2000, DEBUG);
  sendESP8266("AT+CWMODE=3\r\n", 1000, DEBUG);
  sendESP8266("AT+CWJAP=\"" + ssid + "\",\"" + pass + "\"\r\n", 3000, DEBUG); //3000
  sendESP8266("AT+CIPMUX=0\r\n", 1000, DEBUG);

  mq2.setup();
  mq135.setup();
  mg811.setup();
  gp2.setup();
}

void loop() {
  float lpg = mq2.readLPG();
  float co = mq135.readCO();
  float dust = gp2.dustDensity();
  float co2 = mg811.readCO2();

  String url = "";
  //  url += "GET /opensensor/receiver.php?sensor1=11&sensor2=22 HTTP/1.1\r\nHost: ";
  url += "GET /opensensor/receiver.php?mq2=";
  url += lpg;
  url += "&mq135=";
  url += co;
  url += "&mg811=";
  url += co2;
  url += "&gp2y10=";
  url += dust;
  url += " HTTP/1.1\r\nHost: ";
  url += ipserver;
  url += "\r\n";
  url += " Connection: close";
  url += "\r\n\r\n";

  //      int lengthurl = url.length();
  //      Serial.print("Length: ");Serial.print(url.length());

  sendESP8266("AT+CIPSTART=\"TCP\",\"" + ipserver + "\",80\r\n", 1000, DEBUG); //2000
  String cipsend = "AT+CIPSEND=";
  cipsend += url.length();
  cipsend += "\r\n";

  sendESP8266(cipsend, 1000, DEBUG); //2000
  sendESP8266(url,6000, DEBUG); //6000
  //  delay(10000);
}


