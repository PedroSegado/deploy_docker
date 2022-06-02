. .env

cd ./tsugi
mkdir src_volume
cd src_volume
git clone --branch codetest-customizations          https://github.com/KA226-COVID/tsugi.git
git clone --branch master         https://github.com/KA226-COVID/codetest.git
cd ..
cd ..

cd ./central-repository
mkdir src_volume
cd src_volume
git clone --branch master                  https://github.com/KA226-COVID/questions-storage.git
cd ..
cd ..

cd ./validators
mkdir src_volume
cd src_volume
git clone --branch master                             https://${GITHUB_TOKEN}@github.com/KA226-COVID/feedback-manager.git
git clone --branch master                       https://${GITHUB_TOKEN}@github.com/KA226-COVID/xml-evaluator.git
git clone --branch master                           https://${GITHUB_TOKEN}@github.com/KA226-COVID/java-evaluator.git
git clone --branch master                           https://${GITHUB_TOKEN}@github.com/KA226-COVID/sql-evaluator.git
cd ..
cd ..
