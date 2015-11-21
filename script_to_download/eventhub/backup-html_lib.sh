SCRIPTDIR="$(dirname "$0")"
source $SCRIPTDIR/config.sh
outfileSuffix="html_lib"
outfileFullName=$outpath/$site-$outfileSuffix-$1

backupFolder="html/lib"
backupPath=$rootPath

cd $backupPath
tar -cf $outfileFullName.tar $backupFolder
zip -m -9 $outfileFullName.zip $outfileFullName.tar

ls -ltr $outpath/*$1*
