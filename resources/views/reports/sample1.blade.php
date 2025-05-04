<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @page {
            margin: 10px;
            border: 0.5px solid #999;
        }
        html, body{
            border: 0.5px solid #999;
            margin: 5px;
            padding: 5px;
            font-size: 7px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            
        }
        .bghijau{
            background-color: #267544;
            color: white;
            text-align: center;
        }
        .center{
            text-align: center;
        }
        .kiri{
            text-align: left;
        }
        .kanan{
            text-align: right;
        }
        .footer-note {
            position: fixed;
            bottom: 5px;
            right: 10px;
            font-size: 6px;
            color: #666;
        }
    </style>
</head>
<body>
    <table width="100%">
        <tr class="center">
            @php
                $logoPath = public_path('stepoil_logo.jpeg');
            @endphp
            <td width="25%">
                @if(file_exists($logoPath))
                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents($logoPath)) }}"
                        alt="Step Oil Logo"
                        style="width: 150px; height: auto; object-fit: contain; solid #ccc;" />
                @else
                    <p>No logo found</p>
                @endif
            </td>

            <td width="50%"><B style="font-size:15px">DWM DAILY REPORT NO. {{ $wellinfo->urut }}</B><br>
                <span style="font-size:10px">PT Step Oiltools, Graha Inti Fauzi 12th Floor <br>
                Jl. Buncit Raya No. 22 Jakarta 12510 - Indonesia Tel: +62 21 7943352</span>
            </td>
            <td width="25%">
                @php
                    $logoPath = public_path('isi/logos/' . $wellinfo->project->logo);
                @endphp
                @if(file_exists($logoPath))
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents($logoPath)) }}"
                        alt="{{ $wellinfo->project->operator_name ?? '-' }}"
                        style="width: 70px; height: 35px; object-fit: contain; border: 1px solid #ccc;" />
                @else
                    <p>No logo</p>
                @endif

            </td>
        </tr>
    </table>
    <!-- WELL INFO -->
    <table width="100%">
        <tr>
            <td width="15%" class="kanan">
                <b>Operator</b>
            </td>
            <td width="16%">
                : {{ $wellinfo->project->operator_name ?? '-' }}
            </td>
            <td width="2%"></td>
            <td width="12%" class="kanan">
                <b>Depth (ft)</b>
            </td>
            <td width="10%">
                : {{ $details->curdepth }}
            </td>
            <td width="5%">
                feet
            </td>
            <td width="2%"> </td>
            <td width="12%" class="kanan">
                <b>Date</b>
            </td>
            <td width="10%">
                : {{ \Carbon\Carbon::parse($wellinfo->curdate)->format('d-M-Y') ?? '-' }}
            </td>
            <td width="5%">
                
            </td>
        </tr>
    </table>
    
    <table width="100%">
        <tr>
            <td width="15%" class="kanan">
                <b>Well Name</b>
            </td>
            <td width="16%">
                : {{ $wellinfo->wellname ?? '-' }}
            </td>
            <td width="2%"></td>
            <td width="12%" class="kanan">
                <b>Depth 1 Day Before</b>
            </td>
            <td width="10%">
                : {{ $details->depth1bef ?? '-' }}
            </td>
            <td width="5%">
                feet
            </td>
            <td width="2%"> </td>
            <td width="12%" class="kanan">
                <b>Spud-in Date</b>
            </td>
            <td width="10%">
                : {{ \Carbon\Carbon::parse($wellinfo->spud_date)->format('d-M-Y') ?? '-' }}
            </td>
            <td width="5%">
                
            </td>
        </tr>
    </table>
    
    <table width="100%">
        <tr>
            <td width="15%" class="kanan">
                <b>Location</b>
            </td>
            <td width="16%">
                : {{ $wellinfo->location ?? '-' }}
            </td>
            <td width="2%"></td>
            <td width="12%" class="kanan">
                <b>% Washout</b>
            </td>
            <td width="10%">
                : {{ $details->washout ?? '-' }}
            </td>
            <td width="5%">
                %
            </td>
            <td width="2%"> </td>
            <td width="12%" class="kanan">
                <b>Bit Size (inch)</b>
            </td>
            <td width="10%">
                : {{ $details->bitsize ?? '-' }}
            </td>
            <td width="5%">
                inch
            </td>
        </tr>
    </table>
    
    <table width="100%">
        <tr>
            <td width="15%" class="kanan">
                <b>Operator Rep</b>
            </td>
            <td width="16%">
                : {{ $wellinfo->companyman ?? '-' }}
            </td>
            <td width="2%"></td>
            <td width="12%" class="kanan">
                <b>Vol Hole Drilled ({{ $details->volholeunit ?? '-' }})</b>
            </td>
            <td width="10%">
                : {{ $details->volholedrill ?? '-' }}
            </td>
            <td width="5%">
                bbls
            </td>
            <td width="2%"> </td>
            <td width="12%" class="kanan">
                <b>Bit Type</b>
            </td>
            <td width="10%">
                : {{ $details->bittype ?? '-' }}
            </td>
            <td width="5%">
                
            </td>
        </tr>
    </table>
    
    <table width="100%">
        <tr>
            <td width="15%" class="kanan">
                <b>Contractor Rep</b>
            </td>
            <td width="16%">
                : {{ $wellinfo->oim ?? '-' }}
            </td>
            <td width="2%"></td>
            <td width="12%" class="kanan">
                <b>Fluids Type</b>
            </td>
            <td width="10%">
                : {{ $fluidtype ?? '-' }}
            </td>
            <td width="5%">
                
            </td>
            <td width="2%"> </td>
            <td width="12%" class="kanan">
                <b>Avg. ROP for Drlg Hrs</b>
            </td>
            <td width="10%">
                : {{ $details->avgrop ?? '-' }}
            </td>
            <td width="5%">
                (hrs)
            </td>
        </tr>
    </table>
    
    <table width="100%">
        <tr>
            <td width="15%" class="kanan">
                <b>Drilling Rig</b>
            </td>
            <td width="16%">
                : {{ $project->drillingrig ?? '-' }}
            </td>
            <td width="2%"></td>
            <td width="12%" class="kanan">
                <b>Activity</b>
            </td>
            <td width="10%">
                : {{ $details->rigpresentact ?? '-' }}
            </td>
            <td width="5%">
                
            </td>
            <td width="2%"> </td>
            <td width="12%" class="kanan">
                <b>Circulating Rate gpm</b>
            </td>
            <td width="10%">
                : {{ $details->cirrategpm ?? '-' }}
            </td>
            <td width="5%">
                (gal/min)
            </td>
        </tr>
    </table>

    <!-- ACTIVE MUD PROPERTIES -->
    <table width="100%">
        <tr>
            <td colspan="10" class="center bghijau">
                <b>A C T I V E &nbsp;&nbsp; M U D &nbsp;&nbsp; P R O P E R T I E S</b>
            </td>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td width="10%" class="kanan">
                Mud Weight ({{ $details->mwunit ?? '-' }})
            </td>
            <td width="10%">
                : {{ $details->mudweight ?? '-' }}
            </td>
            <td width="10%" class="kanan">
                % LGS
            </td>
            <td width="10%">
                : {{ $details->lgsactive ?? '-' }}
            </td>
            <td width="10%" class="kanan">
                PV (cps)
            </td>
            <td width="10%">
                : {{ $details->pv ?? '-' }}
            </td>
            <td width="10%" class="kanan">
                YP (lbs/100 ft<sup>2</sup>)
            </td>
            <td width="10%">
                : {{ $details->yp ?? '-' }}
            </td>
            <td width="10%" class="kanan">
                {{ $categories1 ?? '-' }}
            </td>
            <td width="10%">
                : {{ $rescategories2 }}
            </td>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td width="10%" class="kanan">
                Mud Temp. (F)
            </td>
            <td width="10%">
                : {{ $details->mudtemp ?? '-' }}
            </td>
            <td width="10%" class="kanan">
                % HGS
            </td>
            <td width="10%">
                : {{ $details->hgsactive ?? '-' }}
            </td>
            <td width="10%" class="kanan">
                Sand Cont
            </td>
            <td width="10%">
                : {{ $details->sandcontent ?? '-' }}
            </td>
            <td width="10%" class="kanan">
                Chlorides (mg/L)
            </td>
            <td width="10%">
                : {{ $details->chlorides ?? '-' }}
            </td>
            <td width="10%" class="kanan">
                {{ $categories2 ?? '-' }}
            </td>
            <td width="10%">
                : {{ $rescategories1 }}
            </td>
        </tr>
    </table>

    <!-- EQUIPMENT -->
    <table width="100%" class="bghijau" border="">
        <tr class="center">
            <td width="24.2%" rowspan="2">
                C E N T R I F U G E S
            </td>
            <td width="9.2%">
                Centrifuge 1
            </td>
            <td width="9.2%">
                Centrifuge 2
            </td>
            <td width="10%">
                Centrifuge 3
            </td>
            <td width="35%" colspan="3">
                SHALE SHAKERS & SCREENS
            </td>
            <td width="5%" rowspan="2">
                Running Hrs
            </td>
        </tr>
        <tr>
            <td>
                {{ $details->cf1_sn ?? '-' }}
            </td>
            <td>
                {{ $details->cf2_sn ?? '-' }}
            </td>
            <td>
                {{ $details->cf3_sn ?? '-' }}
            </td>
            <td width="10%">
                Shakers
            </td>
            <td width="15%">
                Model (Type)
            </td>
            <td width="15%">
                Screen Size
            </td>
        </tr>
    </table>
    <table width="100%" border="1">
        <tr>
            <td width="19%" class="kiri">
                Serial Number
            </td>
            <td width="5%" class="kanan">
                
            </td>
            <td width="9%" class="center">
                {{ $details->cf1_sn ?? '-' }}
            </td>
            <td width="9.5%" class="center">
                {{ $details->cf2_sn ?? '-' }}
            </td>
            <td width="10%" class="center">
                {{ $details->cf3_sn ?? '-' }}
            </td>
            <td width="10%" class="center">
                {{ $details->sh1_name ?? '-' }}
            </td>
            <td width="15%" class="center">
                {{ $details->sh1_model ?? '-' }}
            </td>
            <td width="15%" class="center">
                {{ $details->sh1_screensize ?? '-' }}
            </td>
            <td width="5%" class="center">
                {{ $details->sh1_runninghour ?? '-' }}
            </td>
        </tr>

        <tr>
            <td width="19%" class="kiri">
                Mode of Operation
            </td>
            <td width="5%" class="kanan">
                
            </td>
            <td width="9%" class="center">
            {{ $details->cf1_modeofopr ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $details->cf2_modeofopr ?? '-' }}
            </td>
            <td width="10%" class="center">
            {{ $details->cf3_modeofopr ?? '-' }}
            </td>
            <td width="10%" class="center">
                {{ $details->sh2_name ?? '-' }}
            </td>
            <td width="15%" class="center">
                {{ $details->sh2_model ?? '-' }}
            </td>
            <td width="15%" class="center">
                {{ $details->sh2_screensize ?? '-' }}
            </td>
            <td width="5%" class="center">
                {{ $details->sh2_runninghour ?? '-' }}
            </td>
        </tr>
        
        <tr>
            <td width="19%" class="kiri">
                Bowl-Conveyor Wear Reading
            </td>
            <td width="5%" class="kanan">
                (mm)
            </td>
            <td width="9%" class="center">
            {{ $details->cf1_weirplate ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $details->cf2_weirplate ?? '-' }}
            </td>
            <td width="10%" class="center">
            {{ $details->cf3_weirplate ?? '-' }}
            </td>
            <td width="10%" class="center">
                {{ $details->sh3_name ?? '-' }}
            </td>
            <td width="15%" class="center">
                {{ $details->sh3_model ?? '-' }}
            </td>
            <td width="15%" class="center">
                {{ $details->sh3_screensize ?? '-' }}
            </td>
            <td width="5%" class="center">
                {{ $details->sh3_runninghour ?? '-' }}
            </td>
        </tr>
        
        <tr>
            <td width="19%" class="kiri">
                Bowl Speed
            </td>
            <td width="5%" class="kanan">
                (rpm)
            </td>
            <td width="9%" class="center">
                {{ $details->cf1_bowlspeed ?? '-' }}
            </td>
            <td width="9.5%" class="center">
                {{ $details->cf2_bowlspeed ?? '-' }}
            </td>
            <td width="10%" class="center">
                {{ $details->cf3_bowlspeed ?? '-' }}
            </td>
            <td width="10%" class="center">
                {{ $details->sh4_name ?? '-' }}
            </td>
            <td width="15%" class="center">
                {{ $details->sh4_model ?? '-' }}
            </td>
            <td width="15%" class="center">
                {{ $details->sh4_screensize ?? '-' }}
            </td>
            <td width="5%" class="center">
                {{ $details->sh4_runninghour ?? '-' }}
            </td>
        </tr>
        
        <tr>
            <td width="19%" class="kiri">
                Bowl-Conveyor Differential Speed
            </td>
            <td width="5%" class="kanan">
                (rpm)
            </td>
            <td width="9%" class="center">
            {{ $details->cf1_bowlconv ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $details->cf2_bowlconv ?? '-' }}
            </td>
            <td width="10%" class="center">
            {{ $details->cf3_bowlconv ?? '-' }}
            </td>
            <td width="10%" class="center">
                {{ $details->sh5_name ?? '-' }}
            </td>
            <td width="15%" class="center">
                {{ $details->sh5_model ?? '-' }}
            </td>
            <td width="15%" class="center">
                {{ $details->sh5_screensize ?? '-' }}
            </td>
            <td width="5%" class="center">
                {{ $details->sh5_runninghour ?? '-' }}
            </td>
        </tr>
        
        <tr>
            <td width="19%" class="kiri">
                Feed-in Suction from
            </td>
            <td width="5%" class="kanan">
                
            </td>
            <td width="9%" class="center">
            {{ $details->cf1_feedsuc ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $details->cf2_feedsuc ?? '-' }}
            </td>
            <td width="10%" class="center">
            {{ $details->cf3_feedsuc ?? '-' }}
            </td>
            <td width="10%" class="center">
                {{ $details->sh6_name ?? '-' }}
            </td>
            <td width="15%" class="center">
                {{ $details->sh6_model ?? '-' }}
            </td>
            <td width="15%" class="center">
                {{ $details->sh6_screensize ?? '-' }}
            </td>
            <td width="5%" class="center">
                {{ $details->sh6_runninghour ?? '-' }}
            </td>
        </tr>
    </table>

    <table width="100%" border="1">
        <tr>
            <td width="19.5%" class="kiri">
                Effluent Return to
            </td>
            <td width="5%" class="kanan">
                
            </td>
            <td width="9.5%" class="center">
            {{ $details->cf1_effluentreturn ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $details->cf2_effluentreturn ?? '-' }}
            </td>
            <td width="10.5%" class="center">
            {{ $details->cf3_effluentreturn ?? '-' }}
            </td>
            <td width="14%" class="center">
                Screens Changed
            </td>
            <td width="31%" class="kiri" colspan="3">
                {{ $details->screens_changed ?? '-' }}
            </td>
        </tr>
    </table>

    <!-- DESANDER DESILTER-->
    <table width="100%" border="1">
        <tr>
            <td width="19%" class="kiri">
                Underflow Discharge to
            </td>
            <td width="5%" class="kanan">
                
            </td>
            <td width="9%" class="center">
            {{ $details->cf1_underflow ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $details->cf2_underflow ?? '-' }}
            </td>
            <td width="10%" class="center">
            {{ $details->cf3_underflow ?? '-' }}
            </td>
            <td width="23%" class="bghijau" colspan="2">
                DESANDER
            </td>
            <td width="22%" class="bghijau" colspan="2">
                DESILTER
            </td>
        </tr>

        <tr>
            <td width="19%" class="kiri">
                Running Hours
            </td>
            <td width="5%" class="kanan">
                (hrs)
            </td>
            <td width="9%" class="center">
            {{ $details['cf1_runninghour'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $details['cf2_runninghour'] ?? '-' }}
            </td>
            <td width="10%" class="center">
            {{ $details['cf3_runninghour'] ?? '-' }}
            </td>
            <td width="15%" class="kiri">
                Running Hours
            </td>
            <td width="8%" class="center">
                {{ $desanders['run_hour'] ?? '-' }}
            </td>
            <td width="15%" class="kiri">
                Running Hours
            </td>
            <td width="7%" class="center">
                {{ $desilters['run_hour'] ?? '-' }}
            </td>
        </tr>

        <tr>
            <td width="19%" class="kiri">
                Feed-in Rate (Flow Rate)
            </td>
            <td width="5%" class="kanan">
                (gal/min)
            </td>
            <td width="9%" class="center">
            {{ $details['cf1_feedinrate'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $details['cf2_feedinrate'] ?? '-' }}
            </td>
            <td width="10%" class="center">
            {{ $details['cf3_feedinrate'] ?? '-' }}
            </td>
            <td width="15%" class="kiri">
                Feed Rate (gal/min)
            </td>
            <td width="8%" class="center">
                {{ $desanders['feed_rate'] ?? '-' }}
            </td>
            <td width="15%" class="kiri">
                Feed Rate (gal/min)
            </td>
            <td width="7%" class="center">
                {{ $desilters['feed_rate'] ?? '-' }}
            </td>
        </tr>

        <tr>
            <td width="19%" class="kiri">
                Feed-in Density (WT In)
            </td>
            <td width="5%" class="kanan">
                (mwunit)
            </td>
            <td width="9%" class="center">
            {{ $details['cf1_feedindensity'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $details['cf2_feedindensity'] ?? '-' }}
            </td>
            <td width="10%" class="center">
            {{ $details['cf3_feedindensity'] ?? '-' }}
            </td>
            <td width="15%" class="kiri">
                Feed Density
            </td>
            <td width="8%" class="center">
                {{ $desanders['feed_dens'] ?? '-' }}
            </td>
            <td width="15%" class="kiri">
                Feed Density
            </td>
            <td width="7%" class="center">
                {{ $desilters['feed_dens'] ?? '-' }}
            </td>
        </tr>

        <tr>
            <td width="19%" class="kiri">
                Centrate Density (WT Out)
            </td>
            <td width="5%" class="kanan">
                (mwunit)
            </td>
            <td width="9%" class="center">
            {{ $details['cf1_centratedens'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $details['cf2_centratedens'] ?? '-' }}
            </td>
            <td width="10%" class="center">
            {{ $details['cf3_centratedens'] ?? '-' }}
            </td>
            <td width="15%" class="kiri">
                Overflow Density
            </td>
            <td width="8%" class="center">
                {{ $desanders['overflow_dens'] ?? '-' }}
            </td>
            <td width="15%" class="kiri">
                Overflow Density
            </td>
            <td width="7%" class="center">
            {{ $desilters['overflow_dens'] ?? '-' }}
            </td>
        </tr>

        <tr>
            <td width="19%" class="kiri">
                Cake Discard Density (Discard WT)
            </td>
            <td width="5%" class="kanan">
                ({{ $desilters['mwunit'] ?? '-' }})
            </td>
            <td width="9%" class="center">
            {{ $details['cf1_cakediscdens'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $details['cf2_cakediscdens'] ?? '-' }}
            </td>
            <td width="10%" class="center">
            {{ $details['cf3_cakediscdens'] ?? '-' }}
            </td>
            <td width="15%" class="kiri">
                Underflow Density
            </td>
            <td width="8%" class="center">
            {{ $desanders['underflow_dens'] ?? '-' }}
            </td>
            <td width="15%" class="kiri">
                Underflow Density
            </td>
            <td width="7%" class="center">
            {{ $desilters['underflow_dens'] ?? '-' }}
            </td>
        </tr>

        <tr>
            <td width="19%" class="kiri">
                Centrate Return Rate
            </td>
            <td width="5%" class="kanan">
                (gal/min)
            </td>
            <td width="9%" class="center">
            {{ $details['cf1_centratereturn'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $details['cf2_centratereturn'] ?? '-' }}
            </td>
            <td width="10%" class="center">
            {{ $details['cf3_centratereturn'] ?? '-' }}
            </td>
            <td width="15%" class="kiri">
                Vol Discharge (bbls)
            </td>
            <td width="8%" class="center">
            {{ $desanders['vol_discharge'] ?? '-' }}
            </td>
            <td width="15%" class="kiri">
                Vol Discharge (bbls)
            </td>
            <td width="7%" class="center">
            {{ $desilters['vol_discharge'] ?? '-' }}
            </td>
        </tr>

        <tr>
            <td width="19%" class="kiri">
                Cake Discard Flow Rate
            </td>
            <td width="5%" class="kanan">
                (gal/min)
            </td>
            <td width="9%" class="center">
            {{ $details['cf1_cakediscflow'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $details['cf2_cakediscflow'] ?? '-' }}
            </td>
            <td width="10%" class="center">
            {{ $details['cf3_cakediscflow'] ?? '-' }}
            </td>
            <td width="15%" class="kiri">
                Mod-on-Cuttings
            </td>
            <td width="8%" class="center">
            {{ $desanders['mudoncuttings'] ?? '-' }}
            </td>
            <td width="15%" class="kiri">
                Mod-on-Cuttings
            </td>
            <td width="7%" class="center">
            {{ $desilters['mudoncuttings'] ?? '-' }}
            </td>
        </tr>

        <tr>
            <td width="19%" class="kiri">
                Mass Cake Discharge
            </td>
            <td width="5%" class="kanan">
                (kg)
            </td>
            <td width="9%" class="center">
            {{ $details['cf1_masscake'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $details['cf2_masscake'] ?? '-' }}
            </td>
            <td width="10%" class="center">
            {{ $details['cf3_masscake'] ?? '-' }}
            </td>
            <td width="15%" class="kiri">
                Vol Mud Discharge (bbls)
            </td>
            <td width="8%" class="center">
            {{ $desanders['volmud_discharge'] ?? '-' }}
            </td>
            <td width="15%" class="kiri">
                Vol Mud Discharge (bbls)
            </td>
            <td width="7%" class="center">
            {{ $desilters['volmud_discharge'] ?? '-' }}
            </td>
        </tr>

        <tr>
            <td width="19%" class="kiri">
                Volume Cake Discharge
            </td>
            <td width="5%" class="kanan">
                ({{ $details['volholeunit'] ?? '-' }})
            </td>
            <td width="9%" class="center">
            {{ $details['cf1_volcake'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $details['cf2_volcake'] ?? '-' }}
            </td>
            <td width="10%" class="center">
            {{ $details['cf3_volcake'] ?? '-' }}
            </td>
            <td width="15%" class="kiri">
                Head Pressure (psi)
            </td>
            <td width="8%" class="center">
            {{ $desanders['head_pressure'] ?? '-' }}
            </td>
            <td width="15%" class="kiri">
                Head Pressure (psi)
            </td>
            <td width="7%" class="center">
            {{ $desilters['head_pressure'] ?? '-' }}
            </td>
        </tr>
    </table>
    <!--- RETORT WORKSHEET & VOLUME DISCHARGE-->
    <table width="100%" border="">
        <tr class="bghijau">
            <td width="19.5%" rowspan="2">
                RETORT WORKSHEET <br>
                & VOLUME DISCHARGE
            </td>
            <td width="5.5%" class="kanan" rowspan="2">

            </td>
            <td width="9.5%" rowspan="2">
                Shakers <br>
                Overflow
            </td>
            <td width="9.5%" rowspan="2">
                Dryer
            </td>
            <td width="9.5%">
                Centrifuge 1
            </td>
            <td width="9.5%">
                Centrifuge 2
            </td>
            <td width="9.5%">
                Centrifuge 3
            </td>
            <td width="27.5%" colspan="2">
                Cuttings By-Passed (to Overboard)
            </td>
        </tr>
        <tr>
            <td class="bghijau" class="center">
            {{ $details['cf1_sn'] ?? '-' }}
            </td>
            <td class="bghijau" class="center">
            {{ $details['cf2_sn'] ?? '-' }}
            </td>
            <td class="bghijau" class="center">
            {{ $details['cf3_sn'] ?? '-' }}
            </td>
            <td width="13.75%">
                Percentage(%) : {{ $cuttings->percentage ?? '-' }}
            </td>
            <td width="13.75%">
                from depth : {{ $cuttings->from_depth ?? '-' }}
            </td>
        </tr>
    </table>
    <table width="100%" border="">
        <tr>
            <td width="19.5%">
                Type/Model
            </td>
            <td width="5.5%" class="kanan">
                
            </td>
            <td width="9.5%" class="center">
            {{ $details['sh1_model'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $details['cdu1_model'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $details['cf1_model'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $details['cf2_model'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $details['cf3_model'] ?? '-' }}
            </td>
            <td width="13.75%">
                Volume (bbls) : {{ $cuttings->volume ?? '-' }}
            </td>
            <td width="13.75%">
                to depth : {{ $cuttings->to_depth ?? '-' }}
            </td>
        </tr>
        <!-- DAILY WASTE & AVERAGE MOC-->
        <tr>
            <td width="19.5%">
                Sample Time
            </td>
            <td width="5.5%" class="kanan">
                
            </td>
            <td width="9.5%" class="center">
            {{ $retorts['rt_sh_sampletime'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $retorts['rt_cdu_sampletime'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $retorts['rt_cf1_sampletime'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $retorts['rt_cf2_sampletime'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $retorts['rt_cf3_sampletime'] ?? '-' }}
            </td>
            <td width="27.5%" colspan="2" class="bghijau">
                Daily Waste & Average MOC
            </td>
        </tr>
        <tr>
            <td width="19.5%">
                Sample Depth
            </td>
            <td width="5.5%" class="kanan">
                (feet)
            </td>
            <td width="9.5%" class="center">
            {{ $retorts['rt_sh_sampledepth'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $retorts['rt_cdu_sampledepth'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $retorts['rt_cf1_sampledepth'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $retorts['rt_cf2_sampledepth'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $retorts['rt_cf3_sampledepth'] ?? '-' }}
            </td>
            <td width="27.5%" colspan="2" style="font-size: 6px;">
                Daily Waste Generated (Mud & Cuttings), (bbls) :
            </td>
        </tr>
        <tr>
            <td width="19.5%">
                % Base Fluids fr whole Mud
            </td>
            <td width="5.5%" class="kanan">
                (%)
            </td>
            <td width="9.5%" class="center">
            {{ $details['basefluid'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $details['basefluid'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $details['basefluid'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $details['basefluid'] ?? '-' }}
            </td>
            <td width="9.5%" class="center">
            {{ $details['basefluid'] ?? '-' }}
            </td>
            <td width="13.75%">
                Average MOC : {{ $dailyWaste->avg_moc ?? '-' }}
            </td>
            <td width="13.75%" style="font-size: 5px;">
                Avg Discharge %OOC : {{ $dailyWaste->avg_discharge ?? '-' }}
            </td>
        </tr>
    </table>

    <table width="100%" border="" class="center">
        <!-- CHARTS -->
        <tr>
            <td width="19.5%">
                SG Base Fluids
            </td>
            <td width="5.5%" class="kanan">
                (sp.gr)
            </td>
            <td width="9.5%">
            {{ $details['sgbasefluid'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $details['sgbasefluid'] ?? '-' }}
            </td>
            <td width="9.2%">
            {{ $details['sgbasefluid'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $details['sgbasefluid'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $details['sgbasefluid'] ?? '-' }}
            </td>
            <td width="27.8%" rowspan="11">
                @if(!empty($chartBase64))
                    <img src="{{ $chartBase64 }}" alt="OOC Chart" style="width: 100%; max-width: 400px;">
                @else
                    <p>No Chart Available</p>
                @endif
            </td>
        </tr>
        <tr>
            <td width="19.5%">
                SG Drill Solids/Cuttings
            </td>
            <td width="5.5%" class="kanan">
                (sp.gr)
            </td>
            <td width="9.5%">
            {{ $details['sgdrillsolid'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $details['sgdrillsolid'] ?? '-' }}
            </td>
            <td width="9.2%">
            {{ $details['sgdrillsolid'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $details['sgdrillsolid'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $details['sgdrillsolid'] ?? '-' }}
            </td>
        </tr>
        <tr>
            <td width="19.5%">
                Empty Retort Cell Wt
            </td>
            <td width="5.5%" class="kanan">
                (gm)
            </td>
            <td width="9.5%">
            {{ $retorts['rt_sh_emptycell'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cdu_emptycell'] ?? '-' }}
            </td>
            <td width="9.2%">
            {{ $retorts['rt_cf1_emptycell'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cf2_emptycell'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cf3_emptycell'] ?? '-' }}
            </td>
        </tr>
        <tr>
            <td width="19.5%">
                Cell + Wet Sample Wt
            </td>
            <td width="5.5%" class="kanan">
                (gm)
            </td>
            <td width="9.5%">
            {{ $retorts['rt_sh_emptycellwetsamp'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cdu_emptycellwetsamp'] ?? '-' }}
            </td>
            <td width="9.2%">
            {{ $retorts['rt_cf1_emptycellwetsamp'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cf2_emptycellwetsamp'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cf3_emptycellwetsamp'] ?? '-' }}
            </td>
        </tr>
        <tr>
            <td width="19.5%">
                Cell + Dry Cuttings Wt
            </td>
            <td width="5.5%" class="kanan">
                (gm)
            </td>
            <td width="9.5%">
            {{ $retorts['rt_sh_celldrycut'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cdu_celldrycut'] ?? '-' }}
            </td>
            <td width="9.2%">
            {{ $retorts['rt_cf1_celldrycut'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cf2_celldrycut'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cf3_celldrycut'] ?? '-' }}
            </td>
        </tr>
        <tr>
            <td width="19.5%">
                Empty Grad. Cyl. Wt
            </td>
            <td width="5.5%" class="kanan">
                (gm)
            </td>
            <td width="9.5%">
            {{ $retorts['rt_sh_emptycylinder'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cdu_emptycylinder'] ?? '-' }}
            </td>
            <td width="9.2%">
            {{ $retorts['rt_cf1_emptycylinder'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cf2_emptycylinder'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cf3_emptycylinder'] ?? '-' }}
            </td>
        </tr>
        <tr>
            <td width="19.5%">
                Water Vol in Cylinder
            </td>
            <td width="5.5%" class="kanan">
                (cc)
            </td>
            <td width="9.5%">
            {{ $retorts['rt_sh_watervolin'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cdu_watervolin'] ?? '-' }}
            </td>
            <td width="9.2%">
            {{ $retorts['rt_cf1_watervolin'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cf2_watervolin'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cf3_watervolin'] ?? '-' }}
            </td>
        </tr>
        <tr>
            <td width="19.5%">
                Base Fluids Vol in Cylinder
            </td>
            <td width="5.5%" class="kanan">
                (cc)
            </td>
            <td width="9.5%">
            {{ $retorts['rt_sh_basefluidvolincyl'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cdu_basefluidvolincyl'] ?? '-' }}
            </td>
            <td width="9.2%">
            {{ $retorts['rt_cf1_basefluidvolincyl'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cf2_basefluidvolincyl'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cf3_basefluidvolincyl'] ?? '-' }}
            </td>
        </tr>
        <tr>
            <td width="19.5%">
                Wt Cyl+Water+BaseFluids
            </td>
            <td width="5.5%" class="kanan">
                (gm)
            </td>
            <td width="9.5%">
            {{ $retorts['rt_sh_wtcylwaterbf'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cdu_wtcylwaterbf'] ?? '-' }}
            </td>
            <td width="9.2%">
            {{ $retorts['rt_cf1_wtcylwaterbf'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cf2_wtcylwaterbf'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cf3_wtcylwaterbf'] ?? '-' }}
            </td>
        </tr>
        <tr>
            <td width="19.5%">
                Mass of Wet Cuttings
            </td>
            <td width="5.5%" class="kanan">
                (gm)
            </td>
            <td width="9.5%">
            {{ $retorts['rt_sh_massofcutting'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cdu_massofcutting'] ?? '-' }}
            </td>
            <td width="9.2%">
            {{ $retorts['rt_cf1_massofcutting'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cf2_massofcutting'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cf3_massofcutting'] ?? '-' }}
            </td>
        </tr>
        <tr>
            <td width="19.5%">
                Mass of Dry Cuttings
            </td>
            <td width="5.5%" class="kanan">
                (gm)
            </td>
            <td width="9.5%">
            {{ $retorts['rt_sh_massofdry'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cdu_massofdry'] ?? '-' }}
            </td>
            <td width="9.2%">
            {{ $retorts['rt_cf1_massofdry'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cf2_massofdry'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cf3_massofdry'] ?? '-' }}
            </td>
        </tr>
        <tr>
            <td width="19.5%">
                Wt of Water & Base Fluids
            </td>
            <td width="5.5%" class="kanan">
                (gm)
            </td>
            <td width="9.5%">
            {{ $retorts['rt_sh_wtofwaterbf'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cdu_wtofwaterbf'] ?? '-' }}
            </td>
            <td width="9.2%">
            {{ $retorts['rt_cf1_wtofwaterbf'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cf2_wtofwaterbf'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cf3_wtofwaterbf'] ?? '-' }}
            </td>
            <td width="27.8%" class="bghijau">
                RIG / OTHER ACTIVITIES
            </td>
        </tr>
        <tr>
            <td width="19.5%">
                Mass of Base Fluids
            </td>
            <td width="5.5%" class="kanan">
                (gm)
            </td>
            <td width="9.5%">
            {{ $retorts['rt_sh_massofbf'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cdu_massofbf'] ?? '-' }}
            </td>
            <td width="9.2%">
            {{ $retorts['rt_cf1_massofbf'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cf2_massofbf'] ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts['rt_cf3_massofbf'] ?? '-' }}
            </td>
            <td width="27.8%" rowspan="5">
                {{ $additional->rigactivity ?? '-' }}
            </td>
        </tr>
        <tr>
            <td width="19.5%">
                <b>Mud-on-Cuttings</b>
            </td>
            <td width="5.5%" class="kanan" style="font-size: 6px;">
                (vol/vol)
            </td>
            <td width="9.5%">
            {{ $retorts->rt_sh_mudoncutting ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts->rt_cdu_mudoncutting ?? '-' }}
            </td>
            <td width="9.2%">
            {{ $retorts->rt_cf1_mudoncutting ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts->rt_cf2_mudoncutting ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts->rt_cf3_mudoncutting ?? '-' }}
            </td>
        </tr>
        <tr>
            <td width="19.5%">
                <b>Oil-on-Cuttings (w.m)</b>
            </td>
            <td width="5.5%" class="kanan">
                (%)
            </td>
            <td width="9.5%">
            {{ $retorts->rt_sh_ooc ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts->rt_cdu_ooc ?? '-' }}
            </td>
            <td width="9.2%">
            {{ $retorts->rt_cf1_ooc ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts->rt_cf2_ooc ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts->rt_cf3_ooc ?? '-' }}
            </td>
        </tr>
        <tr>
            <td width="19.5%">
                % of Cuttings Discharged
            </td>
            <td width="5.5%" class="kanan">
                (%)
            </td>
            <td width="9.5%">
            {{ $retorts->rt_sh_percofcutting ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts->rt_cdu_percofcutting ?? '-' }}
            </td>
            <td width="9.2%">
            {{ $retorts->rt_cf1_percofcutting ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts->rt_cf2_percofcutting ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts->rt_cf3_percofcutting ?? '-' }}
            </td>
        </tr>
        <tr>
            <td width="19.5%">
                Vol Oil Discharge
            </td>
            <td width="5.5%" class="kanan">
            {{ $details->volholeunit ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts->rt_sh_volbfoildisc ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts->rt_cdu_volbfoildisc ?? '-' }}
            </td>
            <td width="9.2%">
            {{ $retorts->rt_cf1_volbfoildisc ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts->rt_cf2_volbfoildisc ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts->rt_cf3_volbfoildisc ?? '-' }}
            </td>
        </tr>
        <tr>
            <td width="19.5%">
                Vol Mud Discharge
            </td>
            <td width="5.5%" class="kanan">
            {{ $details->volholeunit ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts->rt_sh_volmuddisc ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts->rt_cdu_volmuddisc ?? '-' }}
            </td>
            <td width="9.2%">
            {{ $retorts->rt_cf1_volmuddisc ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts->rt_cf2_volmuddisc ?? '-' }}
            </td>
            <td width="9.5%">
            {{ $retorts->rt_cf3_volmuddisc ?? '-' }}
            </td>
            <td width="27.8%" class="bghijau">
                STEP OILTOOLS ACTIVITIES
            </td>
        </tr>
        <tr>
            <td width="19.5%" class="center">
                <b>Oil Recovered</b>
            </td>
            <td width="15%" colspan="2" class="center">
                <b>Mud Recovered</b>
            </td>
            <td width="37.5%" colspan="4" class="center">
                <b>Cumulative Oil / Mud Recovered</b>
            </td>
            <td width="27.8%" rowspan="5">
            {{ $additional->bssactivity ?? '-' }}
            </td>
        </tr>
        <tr>
            <td width="19.5%" class="center">
            {{ $retorts->oil_recovered ?? '-' }} {{ $details->volholeunit ?? '-' }} (oil)
            </td>
            <td width="15%" colspan="2" class="center">
            {{ $retorts->mud_recovered ?? '-' }} {{ $details->volholeunit ?? '-' }} (mud)
            </td>
            <td width="18.7%" colspan="2" class="center">
            {{ $retorts->cum_oil ?? '-' }} {{ $details->volholeunit ?? '-' }} (oil)
            </td>
            <td width="19%" colspan="2" class="center">
            {{ $retorts->cum_mud ?? '-' }} {{ $details->volholeunit ?? '-' }} (mud)
            </td>
        </tr>
        <!-- PERSONNEL -->
        <tr class="bghijau">
            <td width="19.5%" colspan="" class="kiri">
                <b>Day</b>
            </td>
            <td width="33.7%" colspan="4" class="center">
                STEP OILTOOLS ENGINEERS
            </td>
            <td width="19%" colspan="2" class="kanan">
                <b>Night</b>
            </td>
        </tr>
        <tr>
            <td width="34.5%" colspan="3" class="center">
            {{ $personnel->ds1_name ?? '-' }}
            </td>
            <td width="37.7%" colspan="4" class="center">
            {{ $personnel->ns1_name ?? '-' }}
            </td>
        </tr>
        <tr>
            <td width="34.5%" colspan="3" class="center">
            {{ $personnel->ds2_name ?? '-' }}
            </td>
            <td width="37.7%" colspan="4" class="center">
            {{ $personnel->ds2_name ?? '-' }}
            </td>
        </tr>
    </table>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const canvas = document.getElementById('oocChart');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Shakers', 'Dryer', 'C’fuge 1', 'C’fuge 2', 'C’fuge 3'],
            datasets: [{
                label: '% Oil-on-Cuttings',
                data: [
                    {{ $retorts->rt_sh_ooc ?? 0 }},
                    {{ $retorts->rt_cdu_ooc ?? 0 }},
                    {{ $retorts->rt_cf1_ooc ?? 0 }},
                    {{ $retorts->rt_cf2_ooc ?? 0 }},
                    {{ $retorts->rt_cf3_ooc ?? 0 }}
                ],
                backgroundColor: 'rgba(54, 162, 235, 0.8)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: false,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    ticks: {
                        stepSize: 10
                    }
                }
            }
        }
    });

    // Setelah chart selesai render, convert ke base64 & submit
    setTimeout(() => {
        const base64 = canvas.toDataURL('image/png');
        document.getElementById('chartBase64').value = base64;
        document.getElementById('pdfForm').submit();
    }, 1000);
});
</script>

<div class="footer-note">
    Generated by Field Operation Track System (FOTrack) on {{ \Carbon\Carbon::now()->format('d M Y, H:i') }}
</div>
</body>
</html>


