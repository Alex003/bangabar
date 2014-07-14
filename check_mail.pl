#!/usr/bin/perl

use strict;
use warnings;


my $mail_to='alexdobrov1@gmail.com';
my $from=`hostname`;
chomp($from);
my $bkp="/var/www/app/config/parameters.yml_bak";
my $res=`/var/www/app/console swiftmailer:spool:send`;
my $is="/var/www/app/config/error";
my @spl=split(" ",$res);

my $check;
$check=$spl[5];

print "$spl[5]\n";

if($check ne "sent")
{
print"email is invalid I'll change it to backup";
if (-e $bkp) {
 print "File Exists!";
SendMail($mail_to,$from,$from,"mail just have bee changed to backup","mail have been changed to backup, make a new mail and copy it to file $bkp, you can change the mail for new in file with error /var/www/app/config/parameters.yml_fail and raname it to $bkp, be shure to remove file $is it is absolutely nessesary"); 
system("mv /var/www/app/config/parameters.yml /var/www/app/config/parameters.yml_fail");
system("mv $bkp /var/www/app/config/parameters.yml");
   }
  elsif(!-e $is){
print"backup file does not exist, seems to be there no backup mail";
SendMail($mail_to,$from,$from,"BACKUP MAIL IS BAD","backup file does not exist, seems to be there no backup mail");
system("touch $is");
    }
    else{print"nothing to do... exiting";}
}

sub SendMail(){
my ($mail1,$from1,$mailfrom1,$subj1,$msg1)=@_;
open (SENDMAIL, "|/usr/sbin/sendmail -t")
or return 0;
print SENDMAIL "From: $from1 <$mailfrom1>\n";
print SENDMAIL "To: <$mail1>\n";
print SENDMAIL "Reply-To: <$mail1>\n";
print SENDMAIL "Subject: $subj1\n\n";
print SENDMAIL "$msg1";
close (SENDMAIL) or return 0;
}