color 2
rd /s /q node_modules
rd /s /q build
del package-lock.json
:Loop
for %%a in (01 03 05 04) do (
color %%a
ping 0.0.0.0 -n 1>nul
)
npm install electron
goto :Loop
exit