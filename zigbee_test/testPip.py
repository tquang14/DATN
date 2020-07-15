import subprocess
import sys
import glob

def install(package):
    subprocess.check_call([sys.executable, "-m", "pip", "install", package])

# catch error if any of the following module is not installed than install it
while True:
    try:
        import serial
        break
    except ImportError:
        print("trying to install pyserial module, pls waite")
        install('pyserial')

while True:
    try:
        import pymysql
        break
    except ImportError:
        print("trying to install pyserial module, pls waite")
        install('PyMySQL')

while True:
    try:
        import keyboard
        break
    except ImportError:
        print("trying to install keyboard module, pls waite")
        install('keyboard')
 
def ListingPort():
    """ Lists serial port names

        :raises EnvironmentError:
            On unsupported or unknown platforms
        :returns:
            A list of the serial ports available on the system
    """
    if sys.platform.startswith('win'):
        ports = ['COM%s' % (i + 1) for i in range(256)]
    elif sys.platform.startswith('linux') or sys.platform.startswith('cygwin'):
        # this excludes your current terminal "/dev/tty"
        ports = glob.glob('/dev/tty[A-Za-z]*')
    elif sys.platform.startswith('darwin'):
        ports = glob.glob('/dev/tty.*')
    else:
        raise EnvironmentError('Unsupported platform')

    result = []
    for port in ports:
        try:
            s = serial.Serial(port)
            s.close()
            result.append(port)
        except (OSError, serial.SerialException):
            pass
    return result

def addToDB(t, h, sm):
    # add 3 sensor value: temperature, humidity and soil moisture to MySQL DB
    db = pymysql.connect("localhost","root","","datn" )
    cursor = db.cursor()
    sql = "INSERT INTO sensorVal(temperature, humidity, solidiMoisture) VALUE ({0}, {1}, {2})".format(t, h, sm)
    cursor.execute(sql)
    db.commit()
    db.close()

def sliceData(data, keyword):
    startIndex = data.find(keyword)
    if (startIndex == -1):
        return 'none'
    endIndex = startIndex + len(keyword) + 5 #sensorval lenghts 5 characters
    return data[startIndex + len(keyword) : endIndex]
if __name__ == '__main__':
    #connect com port
    avaliblePorts = ListingPort()
    print("choose one of the following avalible ports: ")
    if (len(avaliblePorts) == 0):
        print("no com port avalible")
        print("check your com port than run script again")
        sys.exit()
    for i in range(0, len(avaliblePorts)):
        print(str(i + 1) + " => " + avaliblePorts[i])
    userPort = int( input("enter port's index: ") )
    while not 1 <= userPort < len(avaliblePorts) + 1:
        userPort = int( input("enter port's index: ") )
    zigbee = serial.Serial(avaliblePorts[int(userPort) - 1], 9600)
    # connect to db
    
    while True:
        data = zigbee.readline().decode('utf-8')
        # check if not null => new data arrived
        if data:
            t = sliceData(data, 't=')
            h = sliceData(data, 'h=')
            sm = sliceData(data, 'sm=')
            addToDB(t, h, sm)