# Generated by Django 3.1.5 on 2021-04-22 19:40

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('Login', '0001_initial'),
    ]

    operations = [
        migrations.AddField(
            model_name='tour_guide',
            name='Status',
            field=models.BooleanField(blank=True, default=False, null=True),
        ),
    ]