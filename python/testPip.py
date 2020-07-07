import subprocess
import sys
import glob

def install(package):
    subprocess.check_call([sys.executable, "-m", "pip", "install", package])

# catch error if pyserial is not installed than install it
while True:
    try:
        import serial
        break
    except ImportError:
        print("trying to install pyserial module, pls waite")
        install('pyserial')

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

if __name__ == '__main__':
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
    print(zigbee.name)