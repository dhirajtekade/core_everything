SCRIPTDIR="$(dirname "$0")"
source $SCRIPTDIR/config.sh
outfileSuffix="html_files"
outfileFullName=$outpath/$site-$outfileSuffix-$1

backupFolder=" html/bootstrap.php html/favicon.ico html/index.php html/install.php html/ls.php html/readme.html html/requirements.html html/upgrade.php html/val.php html/ws.php"
backupPath=$rootPath

cd $backupPath
tar -cf $outfileFullName.tar $backupFolder
zip -m -9 $outfileFullName.zip $outfileFullName.tar

ls -ltr $outpath/*$1*
