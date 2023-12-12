@echo off
color 2
rd /s /q build

:Loop
for %%a in (01 03 05 04) do (
    color %%a
    ping 0.0.0.0 -n 1 >nul
)

rem Change the color before running npm run build
color 5

rem Run npm run build
npm run build

rem Pause to keep the command prompt open
pause

goto :Loop
