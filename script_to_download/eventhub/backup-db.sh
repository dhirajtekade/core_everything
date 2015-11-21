SCRIPTDIR="$(dirname "$0")"
source $SCRIPTDIR/config.sh
source $SCRIPTDIR/db_cred.sh

outfileSuffix="db"
outfileFullName=$outpath/$site-$outfileSuffix-$1
backupFolder=$outfileFullName.sql
backupPath=$outpath

cd $backupPath

mysqldump -u$db_user -p$db_pwd --database $db_name $db_param --result-file=$outfileFullName.sql
tar --remove-files -cf $outfileFullName.tar $backupFolder
zip -m -9 $outfileFullName.zip $outfileFullName.tar

ls -ltr $outpath/*$1*

