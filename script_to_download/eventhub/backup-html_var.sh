SCRIPTDIR="$(dirname "$0")"
source $SCRIPTDIR/config.sh
outfileSuffix="html_var"
outfileFullName=$outpath/$site-$outfileSuffix-$1

backupFolder="html/var/config.system.php html/var/layout.system.php html/var/locales html/var/messaging html/var/processes"
backupPath=$rootPath

cd $backupPath
tar -cf $outfileFullName.tar $backupFolder
zip -m -9 $outfileFullName.zip $outfileFullName.tar

ls -ltr $outpath/*$1*
