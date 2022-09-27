@echo off
FOR /F "eol=# tokens=*" %%i IN (.env) DO SET %%i

cd ./tsugi/src_volume/codetest
git pull origin master
cd ..
cd ..
cd ..

cd ./central-repository/src_volume/questions-storage
git pull origin master
cd ..
cd ..
cd ..

cd ./validators/src_volume
cd feedback-manager
git pull origin master
cd ..
cd xml-evaluator
git pull origin master
cd ..
cd java-evaluator
git pull origin master
cd ..
cd sql-evaluator
git pull origin master
cd ..
cd ..
cd ..
