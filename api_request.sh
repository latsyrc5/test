#script for D8 Projects
CORE="{$(drush status --format=json| tr -d '\n' | cut -d '{' -f 2- | sed 's|\(.*\)}.*|\1|')}"
curl -X POST \
  https://master-7rqtwti-u5mfuqlyo76xc.ca-1.platformsh.site/rest \
  -H 'Accept: application/json' \
  -H "Authorization: ${MODULE_API_ACCESS_TOKEN}" \
  -H 'Content-Type: application/json' \
  -H 'Host: master-7rqtwti-u5mfuqlyo76xc.ca-1.platformsh.site' \
  -d "{ \"data\": ${CORE}, \"type\":\"core\", \"projectID\":\"${PLATFORM_PROJECT}\", \"environment\": \"${PLATFORM_BRANCH}\", \"projectName\":\"\"}"
OUTPUT="{$(drush pm-list --no-core --format=json| tr -d '\n' | cut -d '{' -f 2- | sed 's|\(.*\)}.*|\1|')}"
SECURITY_UPDATES="{$(drush sec --format=json| tr -d '\n' | cut -d '{' -f 2- | sed 's|\(.*\)}.*|\1|')}"
curl -X POST \
  https://master-7rqtwti-u5mfuqlyo76xc.ca-1.platformsh.site/rest \
  -H 'Accept: application/json' \
  -H "Authorization: ${MODULE_API_ACCESS_TOKEN}" \
  -H 'Content-Type: application/json' \
  -H 'Host: master-7rqtwti-u5mfuqlyo76xc.ca-1.platformsh.site' \
  -d "{ \"data\": ${OUTPUT},  \"security_updates\": ${SECURITY_UPDATES}, \"type\":\"module\", \"core\":\"d8\", \"projectID\": \"${PLATFORM_PROJECT}\", \"environment\": \"${PLATFORM_BRANCH}\", \"projectName\":\"\"}"
PHP_VERSION="$(php -v | head -n 1 | cut -d' ' -f2)"
curl -X POST \
  https://master-7rqtwti-u5mfuqlyo76xc.ca-1.platformsh.site/rest \
  -H 'Accept: application/json' \
  -H "Authorization: ${MODULE_API_ACCESS_TOKEN}" \
  -H 'Content-Type: application/json' \
  -H 'Host: master-7rqtwti-u5mfuqlyo76xc.ca-1.platformsh.site' \
  -d "{ \"data\": \"${PHP_VERSION}\", \"type\":\"php\", \"projectID\": \"${PLATFORM_PROJECT}\", \"environment\": \"${PLATFORM_BRANCH}\", \"projectName\":\"\"}"
