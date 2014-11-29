<?php
/*
File revision date: 2-Mai-2008
*/
include($globvars['site']['directory'].'kernel/settings/layout.php');
?>
<style>
.equal {
    display:table;
	margin:10px auto;
	border-spacing:10px;
	width:100%;
}
.row {
    display:table-row;
}
.row a{
	text-decoration:none
}

.row div {
    display:table-cell;
}

.row div.mleft{
	width:50%;
	border: 1px solid #FFCC00;
	background:#FFFFCC;
	padding:5px;
}
.row div.mright{
	width:50%;
	border: 1px solid #009900;
	background:#CCFF99;
	padding:5px;
}

.row div.c1{
	width:20%;
	border: 1px solid #009900;
	background:#CCFF99;
	padding:5px;
	text-align:center;
}
.row div.c2{
	width:20%;
	border: 1px solid #009900;
	background:#CCFF99;
	padding:5px;
	text-align:center;
}
.row div.c3{
	width:20%;
	border: 1px solid #009900;
	background:#CCFF99;
	padding:5px;
	text-align:center;
}
.row div.c4{
	width:20%;
	border: 1px solid #009900;
	background:#CCFF99;
	padding:5px;
	text-align:center;
}
.row div.c5{
	width:20%;
	border: 1px solid #009900;
	background:#CCFF99;
	padding:5px;
	text-align:center;
}

</style>
<div class="equal">
    <div class="row">
        <div class="mleft">
        <h3><img src="<?=$globvars['site_path'];?>/images/config_details.gif" align="absmiddle" alt="Config" /><a href="<?=session_setup($globvars,'index.php?cd=1');?>">Configuration details</a></h3>
        </div>
        <div class="mright">
        <h3><img src="<?=$globvars['site_path'];?>/images/config_opt.gif" alt="Config" align="absmiddle" /><a href="<?=session_setup($globvars,'index.php?');?>">Configuration Options</a></h3>
        </div>
    </div>
</div>
<?php
if (isset($_GET['cd'])):
?>
          <h3>Configuration Details</h3>
          <div style="border: 1px solid #FFCC00;background:#FFFFCC;padding:5px;">
          <TABLE cellSpacing="0" cellPadding="0" width="100%" border="0">
            <TBODY>
              <TR>
                <TD width="26">&nbsp;</TD>
                <TD width="45"></TD>
                <TD width="880"></TD>
              </TR>
              <TR>
                <TD colspan="3" style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:medium; font-weight:bold"><img src="<?=$globvars['site_path'];?>//images/design.jpg">&nbsp;Design<hr size="1" color="#666666" /></TD>
              </TR>
              <tr>
                <td height="10" align="left">&nbsp;</td>
                <td height="10" colspan="2" align="left">Theme&nbsp; <a href="<?=session_setup($globvars,'index.php?id=1');?>"><img src="<?=$globvars['site_path'];?>//images/instalar.gif" alt="instalar" border="0" /></a> </td>
              </tr>
              <tr>
                <td height="10" colspan="2" align="left">&nbsp;</td>
                <td height="10"  align="left" ><?php
				if ($layout=='dynamic'):
					$query=$db->getquery("select cod_skin, ficheiro, active from skin");
					if ($query[0][0]<>''):
						$query=$db->getquery("select cod_skin, ficheiro, active from skin where active='s'");
						if ($query[0][0]<>''):
							echo "<img src='".$globvars['site_path']."/images/check_mark.gif'>&nbsp;&nbsp;<font style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9;' color='#00cc33'>Configurated.</font>";
						else:
							echo "<img src='".$globvars['site_path']."/images/check_mark.gif'>&nbsp;&nbsp;<font style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9;' color='#00cc33'>Installed. Not Yet Activated.</font>";
						endif;						
					else:
						echo "<img src='".$globvars['site_path']."//images/cross_mark.gif'>&nbsp;&nbsp;<font style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9;' color='#FF0000'><strong>Missing Layout.</strong></font>";
					endif;
				else:
					echo "<img src='".$globvars['site_path']."/images/check_mark.gif'>&nbsp;&nbsp;<font style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9;' color='#00cc33'>Static Mode. Installed.</font>";
				endif;
				?>
                </td>
              </tr>
              <TR>
                <TD colspan="3" style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:medium; font-weight:bold"><img src="<?=$globvars['site_path'];?>//images/contents.jpg">&nbsp;Contents
                  <hr size="1" color="#666666" /></TD>
              </TR>
              <TR>
                <TD height="10" align="left">&nbsp;</TD>
                <TD height="10" colspan="2" align="left">Modules&nbsp;
				<a href="<?=session_setup($globvars,'index.php?id=6');?>"><img src="<?=$globvars['site_path'];?>//images/instalar.gif" alt="instalar" border="0"></a>				</TD>
              </TR>
              <TR>
                <TD height="10" colspan="2" align="left">&nbsp;</TD>
                <TD height="10"  align="left" >
				<?php
				$query=$db->getquery("select cod_module, name from module");
				if ($query[0][0]<>''):
					echo "<img src='".$globvars['site_path']."/images/check_mark.gif'>&nbsp;&nbsp;<font style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9;' color='#00cc33'>Installed ".count($query)." modules</font>";
				else:
					echo "<img src='".$globvars['site_path']."//images/cross_mark.gif'>&nbsp;&nbsp;<font style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9;' color='#FF0000'><strong>No modules had been installed.</strong></font>";
				endif;
				?>				</TD>
              </TR>
              <TR>
                <TD height="10" align="left">&nbsp;</TD>
                <TD height="10" colspan="2" align="left">Menu</TD>
              </TR>
              <TR>
                <TD height="10" colspan="2" align="left">&nbsp;</TD>
                <TD height="10"  align="left" >
				<?php
				$query=$db->getquery("SHOW TABLES LIKE 'users'");
				if ($query[0][0]<>''):
					$query=$db->getquery("SHOW TABLES LIKE 'menu'");
					if ($query[0][0]<>''):
						$query2=$db->getquery("select cod_user_type, name from user_type");
						for($i=0;$i<count($query2);$i++):
							$query=$db->getquery("select cod_menu from menu where cod_user_type='".$query2[$i][0]."'");
							echo '<strong>'.$query2[$i][1].'</strong>';
							echo '&nbsp;&nbsp;<a href="'.session_setup($globvars,'index.php?id=9&ut='.$query2[$i][0]).'"><img src="'.$globvars['site_path'].'//images/instalar.gif" alt="instalar" border="0"></a><br />';
							if ($query[0][0]<>''):
								echo "&nbsp&nbsp;&nbsp;&nbsp;<img src='".$globvars['site_path']."/images/check_mark.gif'>&nbsp;&nbsp;<font style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9;' color='#00cc33'>Configurated</font>";
							else:
								echo "&nbsp&nbsp;&nbsp;&nbsp;<img src='".$globvars['site_path']."/images/cross_mark.gif'>&nbsp;&nbsp;<font style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9;' color='#FF0000'>Missing Config</font>";
							endif;
							echo '<br />';
						endfor;
					else:
						echo "<img src='".$globvars['site_path']."/images/cross_mark.gif'>&nbsp;&nbsp;<font style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9;' color='#00cc33'>Static mode.</font>";
					endif;
				else:
					$query=$db->getquery("SHOW TABLES LIKE 'menu'");
					if ($query[0][0]<>''):
						echo "<img src='".$globvars['site_path']."/images/check_mark.gif'>&nbsp;&nbsp;<font style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9;' color='#00cc33'>Static mode.</font>";
					else:
						echo "<img src='".$globvars['site_path']."/images/cross_mark.gif'>&nbsp;&nbsp;<font style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9;' color='#00cc33'>Menu Disabled.</font>";
					endif;
				endif;

				?>
				</TD>
              </TR>
              <TR>
                <TD colspan="3" style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:medium; font-weight:bold"><img src="<?=$globvars['site_path'];?>//images/users.jpg">&nbsp;Users
                  <hr size="1" color="#666666" /></TD>
              </TR>
              <TR>
                <TD height="10" align="left">&nbsp;</TD>
                <TD height="10" colspan="2" align="left">Grupos&nbsp;
				<a href="<?=session_setup($globvars,'index.php?id=15');?>"><img src="<?=$globvars['site_path'];?>//images/instalar.gif" alt="instalar" border="0"></a>				</TD>
              </TR>
              <TR>
                <TD height="10" colspan="2" align="left">&nbsp;</TD>
                <TD height="10"  align="left" >
				<?php
				include($globvars['site']['directory'].'kernel/settings/ums.php');
				if ($ug_type=='dynamic'):
					$query=$db->getquery("select cod_user_type from user_type");
					if ($query[0][0]<>''):
						echo "<img src='".$globvars['site_path']."/images/check_mark.gif'>&nbsp;&nbsp;<font style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9;' color='#00cc33'>Installed ".count($query)." user groups</font>";
					else:
						echo "<img src='".$globvars['site_path']."//images/cross_mark.gif'>&nbsp;&nbsp;<font style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9;' color='#FF0000'><strong>No user groups defined</strong></font>";
					endif;
				else:
					echo "<img src='".$globvars['site_path']."/images/cross_mark.gif'>&nbsp;&nbsp;<font style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9;' color='#00cc33'>User Management System disabled.</font>";
				endif;
				?>
				</TD>
              </TR>
              <TR>
                <TD height="10" align="left">&nbsp;</TD>
                <TD height="10" colspan="2" align="left">Gest&atilde;o&nbsp;
				<a href="<?=session_setup($globvars,'index.php?id=16');?>"><img src="<?=$globvars['site_path'];?>//images/instalar.gif" alt="instalar" border="0"></a></TD>
              </TR>
              <TR>
                <TD height="10" colspan="2" align="left">&nbsp;</TD>
                <TD height="10"  align="left" >
				<?php
				if ($ug_type=='dynamic'):
					$query=$db->getquery("select cod_user from users");
					if ($query[0][0]<>''):
						echo "<img src='".$globvars['site_path']."/images/check_mark.gif'>&nbsp;&nbsp;<font style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9;' color='#00cc33'>".count($query)." registered users.</font>";
						$query2=$db->getquery("select cod_user_type from user_type where name='Administrators'");
						$query=$db->getquery("select cod_user, nick from users where cod_user_type=".$query2[0][0]." and password=PASSWORD('')");
						if ($query[0][0]<>''):
							echo '<br/><strong>Falha de seguran&ccedil;a (utilizadores sem password)</strong><br/>';
							for($i=0;$i<count($query);$i++):
								echo "<img src='".$globvars['site_path']."/images/warning.gif'>&nbsp;&nbsp;<font style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9;' color='#FF0000'>".$query[$i][1]."</font>";
							endfor;
						else:
							echo "<img src='".$globvars['site_path']."/images/check_mark.gif'>&nbsp;&nbsp;<font style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9;' color='#00cc33'>All Administrator accounts have passwords</font>";
						endif;
					else:
						echo "<img src='".$globvars['site_path']."//images/cross_mark.gif'>&nbsp;&nbsp;<font style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9;' color='#FF0000'><strong>No registered users detected</strong></font>";
					endif;
				else:
					echo "<img src='".$globvars['site_path']."/images/cross_mark.gif'>&nbsp;&nbsp;<font style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9;' color='#00cc33'>User Management System disabled.</font>";
				endif;
				?>				</TD>
              </TR>
              <TR>
                <TD colspan="3" style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:medium; font-weight:bold"><img src="<?=$globvars['site_path'];?>//images/database.jpg">&nbsp;DataBase
                  <hr size="1" color="#666666" /></TD>
              </TR>
              <TR>
                <TD height="10" align="left">&nbsp;</TD>
                <TD height="10" colspan="2" align="left">BackUp
				<a href="<?=session_setup($globvars,'index.php?id=14');?>"><img src="<?=$globvars['site_path'];?>//images/instalar.gif" alt="Fazer Backup" border="0"></a>				</TD>
              </TR>
              <TR>
                <TD height="10" align="left">&nbsp;</TD>
                <TD height="10" colspan="2" align="left">Optimize&nbsp;
				<a href="<?=session_setup($globvars,'index.php?id=13');?>"><img src="<?=$globvars['site_path'];?>//images/instalar.gif" alt="Optimizar DB" border="0"></a>				</TD>
              </TR>
              <TR>
                <TD colspan="3" style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:medium; font-weight:bold"><img src="<?=$globvars['site_path'];?>//images/general.jpg">&nbsp;General Config.
                  <hr size="1" color="#666666" /></TD>
              </TR>
              <TR>
                <TD height="10" align="left">&nbsp;</TD>
                <TD height="10" colspan="2" align="left">Static Variables&nbsp;
				<a href="<?=session_setup($globvars,'index.php?id=8');?>"><img src="<?=$globvars['site_path'];?>//images/instalar.gif" alt="instalar" border="0"></a>				</TD>
              </TR>
              <TR>
                <TD height="10" align="left">&nbsp;</TD>
                <TD height="10" colspan="2" align="left">Index file&nbsp;
				<a href="<?=session_setup($globvars,'index.php?id=18');?>"><img src="<?=$globvars['site_path'];?>//images/instalar.gif" alt="instalar" border="0"></a>				</TD>
              </TR>
              <TR>
                <TD height="10" colspan="2" align="left">&nbsp;</TD>
                <TD height="10"  align="left" ><?php
				if (is_file($globvars['site']['directory'].'index.php')):
					echo "<img src='".$globvars['site_path']."/images/check_mark.gif'>&nbsp;&nbsp;<font style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9;' color='#00cc33'>Index file present.</font>";
				else:
					echo "<img src='".$globvars['site_path']."/images/cross_mark.gif'>&nbsp;&nbsp;<font style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9;' color='#00cc33'>Index file not found.</font>";
				endif;
				 ?></TD>
              </TR>
          </TBODY>
		</TABLE>
        </div>
<?php
else:
?>
<h3>Configuration Options</h3>
<div class="equal">
    <div class="row">
        <div class="c1"><a href="<?=session_setup($globvars,'index.php?id=2');?>"><img src="<?=$globvars['site_path'];?>/images/layout.gif" alt="Design" border="0" /><br />
        Layout Design</a>        </div>
        <div class="c2"><a href="<?=session_setup($globvars,'index.php?id=3');?>"><img src="<?=$globvars['site_path'];?>/images/contents.gif" alt="Contents" border="0" /><br />
        Layout Contents</a>        </div>
        <div class="c4"><a href="<?=session_setup($globvars,'index.php?id=6');?>"><img src="<?=$globvars['site_path'];?>/images/modules.png" alt="Modules Management" border="0" /><br />
        Modules Management</a>        </div>
        <div class="c5"><a href="<?=session_setup($globvars,'index.php?id=7');?>"><img src="<?=$globvars['site_path'];?>/images/modules_admin.png" alt="Modules Admin" border="0" /><br />
        Modules Admin</a>        </div>
    </div>
</div>
<div class="equal">
    <div class="row">
        <div class="c1"><a href="<?=session_setup($globvars,'index.php?id=9');?>"><img src="<?=$globvars['site_path'];?>/images/config_opt.gif" alt="Dynamic Menus" border="0" /><br />
        Dynamic Menus
        </a></div>
        <div class="c2"><a href="<?=session_setup($globvars,'index.php?id=8');?>"><img src="<?=$globvars['site_path'];?>/images/general.gif" alt="Site Defenitions" border="0" /><br />
        Site Defenitions</a>        </div>
        <div class="c3"><a href="<?=session_setup($globvars,'index.php?id=10');?>"><img src="<?=$globvars['site_path'];?>/images/features.gif" alt="Features" border="0" /><br />
        Features</a>        </div>
        <div class="c4"><a href="<?=session_setup($globvars,'index.php?id=11');?>"><img src="<?=$globvars['site_path'];?>/images/meta_tags.gif" alt="Filemanager" border="0" /><br />
        Filemanager</a>        </div>
        <div class="c5"><a href="<?=session_setup($globvars,'index.php?id=12');?>"><img src="<?=$globvars['site_path'];?>/images/web.gif" alt="Web Services" border="0" /><br />
        Web Services</a>        </div>
    </div>
</div>
<div class="equal">
    <div class="row">
        <div class="c1"><a href="<?=session_setup($globvars,'index.php?id=12');?>"><img src="<?=$globvars['site_path'];?>/images/security.gif" alt="Security" border="0" /><br />
        Security</a>        </div>
        <div class="c2"><a href="<?=session_setup($globvars,'index.php?id=13');?>"><img src="<?=$globvars['site_path'];?>/images/db.gif" alt="DB" border="0" /><br />
        Database Optimization</a>        </div>
        <div class="c3"><a href="<?=session_setup($globvars,'index.php?id=14');?>"><img src="<?=$globvars['site_path'];?>/images/db.gif" alt="DB" border="0" /><br />
      Database Backup</a>        </div>
    <div class="c4"><a href="<?=session_setup($globvars,'index.php?id=15');?>"><img src="<?=$globvars['site_path'];?>/images/user_groups.gif" alt="User Groups" border="0" /><br />
        User Groups</a>        </div>
        <div class="c5"><a href="<?=session_setup($globvars,'index.php?id=16');?>"><img src="<?=$globvars['site_path'];?>/images/users.gif" alt="Users" border="0" /><br />
        Users</a>        </div>
  </div>
</div>
<?php
endif;
?>