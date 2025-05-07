<?php

namespace App\Exports;

use App\Models\Wellinfo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class WellSummaryExport implements FromCollection, WithHeadings, WithMapping, WithEvents
{
    protected $cf1_sn, $cf2_sn, $cf3_sn, $cdu_model, $cdu_sn;

    public function __construct(protected $projectId)
    {
        $first = \App\Models\Wellinfo::with('details')->where('id_project', $this->projectId)->first();
        $this->cf1_sn = $first?->details?->cf1_sn ?? '';
        $this->cf2_sn = $first?->details?->cf2_sn ?? '';
        $this->cf3_sn = $first?->details?->cf3_sn ?? '';
        $this->cdu_model = $first?->details?->cdu1_model ?? '';
        $this->cdu_sn = $first?->details?->cdu1_sn ?? '';
    }

    public function collection()
    {
        return Wellinfo::with(['project', 'details', 'retorts', 'personnel', 'additional'])
            ->where('id_project', $this->projectId)
            ->get();
    }

    public function headings(): array
    {
        return [
            'Date', 'Bit Size', 'Hole Open', 'Washout %', 'Mud Weight', 'Depth 1 Day Before', 'Depth', 'Vol Hole Drilled', 'Avg ROP', 'Formation', 'Circulating Rate GPM',
            'HGS % Active', 'Active System Vol', 'LGS % Active', 'PV', 'YP', 'Sand Content', 'Chlorides', 'Mud Temp', 'Oil/Water Ratio', 'E-Stability', 'Fluid Type', 'Rig Activity', 'SG Base Fluid',
    
            // Centrifuge 1
            "Cfuge - {$this->cf1_sn}\nOOC", "Cfuge - {$this->cf1_sn}\nBowl RPM", "Cfuge - {$this->cf1_sn}\nConveyor RPM", "Cfuge - {$this->cf1_sn}\nFeed Pump", "Cfuge - {$this->cf1_sn}\nVol Cake",
            "Cfuge - {$this->cf1_sn}\nOil Disc", "Cfuge - {$this->cf1_sn}\nMud Disc", "Cfuge - {$this->cf1_sn}\nCake Dens", "Cfuge - {$this->cf1_sn}\nCake Flow", "Cfuge - {$this->cf1_sn}\nCentrate Return",
            "Cfuge - {$this->cf1_sn}\nCentrate MW", "Cfuge - {$this->cf1_sn}\nFeed MW", "Cfuge - {$this->cf1_sn}\nPress", "Cfuge - {$this->cf1_sn}\nRun Hour",
    
            // Centrifuge 2
            "Cfuge - {$this->cf2_sn}\nOOC", "Cfuge - {$this->cf2_sn}\nBowl RPM", "Cfuge - {$this->cf2_sn}\nConveyor RPM", "Cfuge - {$this->cf2_sn}\nFeed Pump", "Cfuge - {$this->cf2_sn}\nVol Cake",
            "Cfuge - {$this->cf2_sn}\nOil Disc", "Cfuge - {$this->cf2_sn}\nMud Disc", "Cfuge - {$this->cf2_sn}\nCake Dens", "Cfuge - {$this->cf2_sn}\nCake Flow", "Cfuge - {$this->cf2_sn}\nCentrate Return",
            "Cfuge - {$this->cf2_sn}\nCentrate MW", "Cfuge - {$this->cf2_sn}\nFeed MW", "Cfuge - {$this->cf2_sn}\nPress", "Cfuge - {$this->cf2_sn}\nRun Hour",
    
            // Centrifuge 3
            "Cfuge - {$this->cf3_sn}\nOOC", "Cfuge - {$this->cf3_sn}\nBowl RPM", "Cfuge - {$this->cf3_sn}\nConveyor RPM", "Cfuge - {$this->cf3_sn}\nFeed Pump", "Cfuge - {$this->cf3_sn}\nVol Cake",
            "Cfuge - {$this->cf3_sn}\nOil Disc", "Cfuge - {$this->cf3_sn}\nMud Disc", "Cfuge - {$this->cf3_sn}\nCake Dens", "Cfuge - {$this->cf3_sn}\nCake Flow", "Cfuge - {$this->cf3_sn}\nCentrate Return",
            "Cfuge - {$this->cf3_sn}\nCentrate MW", "Cfuge - {$this->cf3_sn}\nFeed MW", "Cfuge - {$this->cf3_sn}\nPress", "Cfuge - {$this->cf3_sn}\nRun Hour",
    
            // Cutting Dryer
            "Cut Dryer - {$this->cdu_model} {$this->cdu_sn}\nOOC", "Cut Dryer - {$this->cdu_model} {$this->cdu_sn}\nOil Disc", "Cut Dryer - {$this->cdu_model} {$this->cdu_sn}\nMud Disc", "Cut Dryer - {$this->cdu_model} {$this->cdu_sn}\nTo Dryer",
            "Cut Dryer - {$this->cdu_model} {$this->cdu_sn}\nFrom Dryer", "Cut Dryer - {$this->cdu_model} {$this->cdu_sn}\nScreen Size", "Cut Dryer - {$this->cdu_model} {$this->cdu_sn}\nRun Hour",
    
            // Shaker
            "Shaker\nOOC", "Oil Recovered", "Mud Recovered",
    
            // Cumulative
            "Cumulative Oil", "Cumulative Mud",
    
            // STEP ENGINEERS
            "ENGINEER\nDay Shift 1", "ENGINEER\nDay Shift 2", "ENGINEER\nNight Shift 1", "ENGINEER\nNight Shift 2",
    
            // Activities
            "Rig Activity", "Step Oil Activities",
    
            // Well Info
            "Operator", "Well Name", "Location", "Company Man", "OIM", "Drilling Rig",
        ];
    }
    

    public function map($well): array
    {
        $d = $well->details;
        $r = $well->retorts;
        $p = $well->personnel;
        $a = $well->additional;
        $proj = $well->project;
    
        return [
            // General
            $well->curdate ?? '', $d?->bitsize ?? '', '', $d?->washout ?? '', $d?->mudweight ?? '', $d?->depth1bef ?? '',
            $d?->curdepth ?? '', $d?->volholedrill ?? '', $d?->avgrop ?? '', '', $d?->cirrategpm ?? '',
            $d?->hgsactive ?? '', $d?->activesystem ?? '', $d?->lgsactive ?? '', $d?->pv ?? '', $d?->yp ?? '', $d?->sandcontent ?? '',
            $d?->chlorides ?? '', $d?->mudtemp ?? '', $d?->categories2 ?? '', $d?->categories1 ?? '', $d?->fluidtype ?? '', $a?->rigactivity ?? '', $d?->sgbasefluid ?? '',
    
            // Centrifuge 1
            $r?->rt_cf1_ooc ?? '', $d?->cf1_bowlspeed ?? '', $d?->cf1_bowlconv ?? '', $d?->cf1_feedsuc ?? '', $d?->cf1_volcake ?? '',
            $r?->rt_cf1_volbfoildisc ?? '', $r?->rt_cf1_volmuddisc ?? '', $d?->cf1_cakediscdens ?? '', $d?->cf1_cakediscflow ?? '', $d?->cf1_centratereturn ?? '',
            $d?->cf1_centratedens ?? '', $d?->cf1_feedindensity ?? '', '', $d?->cf1_runninghour ?? '',
    
            // Centrifuge 2
            $r?->rt_cf2_ooc ?? '', $d?->cf2_bowlspeed ?? '', $d?->cf2_bowlconv ?? '', $d?->cf2_feedsuc ?? '', $d?->cf2_volcake ?? '',
            $r?->rt_cf2_volbfoildisc ?? '', $r?->rt_cf2_volmuddisc ?? '', $d?->cf2_cakediscdens ?? '', $d?->cf2_cakediscflow ?? '', $d?->cf2_centratereturn ?? '',
            $d?->cf2_centratedens ?? '', $d?->cf2_feedindensity ?? '', '', $d?->cf2_runninghour ?? '',
    
            // Centrifuge 3
            $r?->rt_cf3_ooc ?? '', $d?->cf3_bowlspeed ?? '', $d?->cf3_bowlconv ?? '', $d?->cf3_feedsuc ?? '', $d?->cf3_volcake ?? '',
            $r?->rt_cf3_volbfoildisc ?? '', $r?->rt_cf3_volmuddisc ?? '', $d?->cf3_cakediscdens ?? '', $d?->cf3_cakediscflow ?? '', $d?->cf3_centratereturn ?? '',
            $d?->cf3_centratedens ?? '', $d?->cf3_feedindensity ?? '', '', $d?->cf3_runninghour ?? '',
    
            // Cutting Dryer
            $r?->rt_cdu_ooc ?? '', $r?->rt_cdu_volbfoildisc ?? '', $r?->rt_cdu_volmuddisc ?? '', '', '', $d?->cdu1_screensize ?? '', $d?->cdu1_runninghour ?? '',
    
            // Shaker
            $r?->rt_sh_ooc ?? '', $r?->oil_recovered ?? '', $r?->mud_recovered ?? '',
    
            // Cumulative
            $r?->cum_oil ?? '', $r?->cum_mud ?? '',
    
            // STEP ENGINEERS
            $p?->ds1_name ?? '', $p?->ds2_name ?? '', $p?->ns1_name ?? '', $p?->ns2_name ?? '',
    
            // Activity
            $a?->rigactivity ?? '', $a?->bssactivity ?? '',
    
            // Well Info
            $proj?->operator_name ?? '', $well->wellname ?? '', $well->location ?? '', $well->companyman ?? '', $well->oim ?? '', $proj?->drillingrig ?? '',
        ];
    }
    
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
    
                $sheet = $event->sheet->getDelegate();
    
                // Style Header
                $sheet->getStyle('A1:CL1')->applyFromArray([
                    'fill' => ['fillType' => 'solid', 'color' => ['rgb' => 'D9D9D9']],
                    'font' => ['bold' => true],
                    'alignment' => ['horizontal' => 'center', 'vertical' => 'center', 'wrapText' => true],
                    'borders' => ['allBorders' => ['borderStyle' => 'thin']],
                ]);
    
                // Freeze header
                $sheet->freezePane('A2');
    
                // Set width per kolom (SESUAI HEADER BUKAN DATA)
                $widths = [
                    15, 10, 10, 10, 10, 15, 12, 15, 12, 12, 15, 
                    12, 15, 12, 8, 8, 12, 10, 10, 12, 12, 10, 15, 12, // General sampai SG Base
    
                    // Centrifuge (14x3)
                    15, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12,
                    15, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12,
                    15, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12,
    
                    // Cutting Dryer
                    15, 12, 12, 12, 12, 12, 12,
    
                    // Shaker
                    12, 12, 12,
    
                    // Cumulative
                    12, 12,
    
                    // STEP Engineers
                    20, 20, 20, 20,
    
                    // Activity + Well Info
                    30, 25, // rigactivity, step activities
                    15, 20, 15, 15, 12, 15, // operator - drilling rig
                ];
    
                $column = 'A';
                foreach ($widths as $width) {
                    $sheet->getColumnDimension($column)->setWidth($width);
                    $column++;
                }
            }
        ];
    }
    
}