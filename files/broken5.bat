
setlocal enabledelayedexpansion
@echo off
color 0A
:m2
cls
echo Подбор пароля к серверу Пентагона...
echo.
set j=0
:m1
set line= 
for /l %%i in (0,1,36) do ( 
set /a dig=!random!%%3
if "!dig!"=="2" (set "dig= ")
set line=!line!!dig! 
) 
echo.%line% 
call :wait
set /a j=%j%+1
if %j%==42 (call :pass & call :wait & goto m2)
goto m1

:wait
@Echo off
@echo wscript.Sleep 100>"%temp%\sleep30.vbs" 
cscript //nologo "%temp%\sleep30.vbs" 
del "%temp%\sleep30.vbs"
exit /b

:pass
set b=0
echo.
:p1 
call :wait
< nul set /p "m=* "
set /a b=%b%+1
if %b%==16 (
echo ERROR
call :wait
exit /b)
goto p1
