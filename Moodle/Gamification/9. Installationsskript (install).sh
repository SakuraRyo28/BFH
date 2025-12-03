#!/bin/bash
# Installation des Quest-Plugins

echo "=== Quest Plugin Installation ==="

# 1. Verzeichnis erstellen
mkdir -p /path/to/moodle/local/quest/{db,classes/event,templates}

# 2. Dateien kopieren (hier müsstest du deine Dateien haben)
# cp version.php /path/to/moodle/local/quest/
# cp lang/en/local_quest.php /path/to/moodle/local/quest/lang/en/
# ... usw.

# 3. Berechtigungen setzen
chown -R www-data:www-data /path/to/moodle/local/quest
chmod -R 755 /path/to/moodle/local/quest

# 4. Moodle Upgrade durchführen
cd /path/to/moodle
sudo -u www-data php admin/cli/upgrade.php --non-interactive

echo "=== Installation abgeschlossen ==="
echo "1. Plugin aktivieren unter: Website-Administration -> Plugins -> Lokale Plugins"
echo "2. In einem Kurs: Bearbeiten einschalten -> Block hinzufügen -> 'Quest Dashboard'"
