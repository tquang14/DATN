import serial
ser = serial.Serial('com3', 9600)
while True:
    data = ser.readline()
    print(data.decode('utf-8'), end = '')