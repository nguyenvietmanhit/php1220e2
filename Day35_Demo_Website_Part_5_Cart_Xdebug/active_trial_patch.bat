cd %APPDATA%\JetBrains\PhpStorm2021.1*
rmdir "eval" /s /q
del "options\other.xml"
reg delete "HKEY_CURRENT_USER\Software\JavaSoft\Prefs\jetbrains"